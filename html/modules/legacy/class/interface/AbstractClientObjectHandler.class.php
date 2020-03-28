<?php
/**
 * @file
 * @package legacy
 * @version $Id$
**/

if (!defined('XOOPS_ROOT_PATH')) {
    exit;
}

/**
 * Legacy_AbstractClientObjectHandler
**/
abstract class Legacy_AbstractClientObjectHandler extends XoopsObjectGenericHandler
{
    protected $_mClientField = ['title' =>'title', 'category' =>'category_id', 'posttime' =>'posttime'];
    protected $_mClientConfig = ['tag' =>'tag_dirname', 'image' =>'use_image', 'workflow' =>'use_workflow', 'activity' =>'use_activity', 'map' =>'use_map'];

    /**
     * _getTagList
     *
     * @param XoopsSimpleObject	$obj
     *
     * @return	string[]
     */
    protected function _getTagList(/*** XoopsSimpleObject ***/ $obj)
    {
        return $obj->mTag;
    }

    /**
     * insert data to table
     *
     * @param XoopsSimpleObject	$obj
     * @param bool	$force
     *
     * @return	bool
     */
    public function insert(/*** XoopsSimpleObject ***/ &$obj, /*** bool ***/ $force=false)
    {
        $ret = parent::insert($obj, $force);
        if (true == $ret) {
            $ret = $this->_setClientData($obj);
        }
    
        return $ret;
    }

    /**
     * delete data from table
     *
     * @param XoopsSimpleObject	$obj
     * @param bool	$force
     *
     * @return	bool
     */
    public function delete(/*** XoopsSimpleObject ***/ &$obj, /*** bool ***/ $force=false)
    {
        $ret = parent::delete($obj, $force);
        $this->_deleteClientData($obj);
    
        return $ret;
    }

    /**
     * set client data: tag, image, activity, workflow
     *
     * @param XoopsSimpleObject	$obj
     *
     * @return	bool
     */
    protected function _setClientData(/*** XoopsSimpleObject ***/ $obj)
    {
        $handler = xoops_gethandler('config');
        $conf = $handler->getConfigsByDirname($obj->getDirname());
    
        $ret = true;
        if (true === $this->_isActivityClient($conf)) {
            if (false === $this->_saveActivity($obj)) {
                $ret = false;
            }
        }
    
        if (true === $this->_isTagClient($conf)) {
            if (false === $this->_saveTags($obj, $conf[$this->_mClientConfig['tag']])) {
                $ret = false;
            }
        }
    
        if (true === $this->_isImageClient($conf)) {
            if (false === $this->_saveImages($obj)) {
                $ret = false;
            }
        }
    
        if (true === $this->_isMapClient($conf)) {
            if (false === $this->_saveMap($obj)) {
                $ret = false;
            }
        }
    
        return $ret;
    }

    /**
     * delete client data: tag, activity, workflow, image
     *
     * @param XoopsSimpleObject	$obj
     *
     * @return	bool
     */
    protected function _deleteClientData(/*** XoopsSimpleObject ***/ $obj)
    {
        $handler = xoops_gethandler('config');
        $conf = $handler->getConfigsByDirname($obj->getDirname());
    
        $ret = true;
        if (true === $this->_isActivityClient($conf)) {
            if (false === $this->_deleteActivity($obj)) {
                $ret = false;
            }
        }
    
        if (true === $this->_isTagClient($conf)) {
            if (false === $this->_deleteTags($obj, $tagDirname)) {
                $ret = false;
            }
        }
    
        if (true === $this->_isWorkflowClient($conf)) {
            $ret = $this->_deleteWorkflow($obj);
        }
    
        if (true === $this->_isImageClient($conf)) {
            if (false === $this->_deleteImages($obj)) {
                $ret = false;
            }
        }
        return $ret;
    }

    /**
     * save activity
     *
     * @param XoopsSimpleObject	$obj
     *
     * @return	bool
     */
    protected function _saveActivity(/*** XoopsSimpleObject ***/ $obj)
    {
        $ret = false;
        XCube_DelegateUtils::call(
            'Legacy_Activity.AddActivity',
            new XCube_Ref($ret),
            $obj->get('uid'),
            $obj->get($this->_mClientField['category']),
            $obj->getDirname(),
            $this->getDataname(),
            $obj->get($this->mPrimary),
            $obj->get($this->_mClientField['posttime'])
        );
        return $ret;
    }

    /**
     * save tags
     *
     * @param XoopsSimpleObject	$obj
     * @param string	$tagDirname
     *
     * @return	bool
     */
    protected function _saveTags(/*** XoopsSimpleObject ***/ $obj, /*** string ***/ $tagDirname)
    {
        $ret = false;
        XCube_DelegateUtils::call('Legacy_Tag.'.$tagDirname.'.SetTags',
            new XCube_Ref($ret),
            $tagDirname,
            $obj->getDirname(),
            $this->getDataname(),
            $obj->get($this->mPrimary),
            $obj->get($this->_mClientField['posttime']),
            $this->_getTagList($obj)
        );
        return $ret;
    }

    /**
     * upload and save images
     *
     * @param XoopsSimpleObject	$obj
     *
     * @return	bool
     */
    protected function _saveImages(/*** Legacy_AbstractObject ***/ $obj)
    {
        $ret = true;
        $obj->setupImages();
        foreach ($obj->mImage as $image) {
            $result = false;
            if (true === $image->isDeleted()) {    //delete image
                XCube_DelegateUtils::call('Legacy_Image.DeleteImage', new XCube_Ref($result), $image);
            } else {    //save image
                XCube_DelegateUtils::call('Legacy_Image.SaveImage', new XCube_Ref($result), $image);
            }
            if (false === $result) {
                $ret = false;
            }
        }
    
        return $ret;
    }

    /**
     * save map data
     *
     * @param XoopsSimpleObject $obj
     *
     * @return array
     */
    protected function _saveMap($obj)
    {
        $result = [];
        XCube_DelegateUtils::call(
            'Legacy_Map.SetPlace',
            new XCube_Ref($result),
            $obj->getDirname(),
            $obj->getDataname(),
            $obj->get($obj->getPrimary()),
            $obj->mLatlng,
            $obj->get($this->_mClientField['posttime'])
        );
    
        return $result;
    }

    /**
     * delete activity
     *
     * @param XoopsSimpleObject	$obj
     *
     * @return	bool
     */
    protected function _deleteActivity(/*** XoopsSimpleObject ***/ $obj)
    {
        $ret = false;
        XCube_DelegateUtils::call('Legacy_Activity.DeleteActivity', new XCube_Ref($ret), $obj->getDirname(), $this->getDataname(), $obj->get($this->mPrimary));
        return $ret;
    }

    /**
     * delete tags
     *
     * @param XoopsSimpleObject	$obj
     * @param string	$tagDirname
     *
     * @return	bool
     */
    protected function _deleteTags(/*** XoopsSimpleObject ***/ $obj, /*** string ***/ $tagDirname)
    {
        $ret = false;
        XCube_DelegateUtils::call(
            'Legacy_Tag.'.$tagDirname.'.SetTags',
            new XCube_Ref($ret),
            $tagDirname,
            $obj->getDirname(),
            $this->getDataname(),
            $obj->get($this->mPrimary),
            $obj->get($this->_mClientField['posttime']),
            []
        );
        return $ret;
    }

    /**
     * delete workflow
     *
     * @param XoopsSimpleObject	$obj
     *
     * @return	void
     */
    protected function _deleteWorkflow(/*** XoopsSimpleObject ***/ $obj)
    {
        XCube_DelegateUtils::call('Legacy_Workflow.DeleteItem', $obj->getDirname(), $this->getDataname(), $obj->get($this->mPrimary));
    }

    /**
     * delete images
     *
     * @param XoopsSimpleObject	$obj
     *
     * @return	bool
     */
    protected function _deleteImages(/*** XoopsSimpleObject ***/ $obj)
    {
        $ret = true;
        $isPost = false;
        $obj->setupImages($isPost);
        foreach ($obj->mImage as $image) {
            if (!($image instanceof Legacy_AbstractImageObject)) {
                continue;
            }
            $result = false;
            XCube_DelegateUtils::call('Legacy_Image.DeleteImage', new XCube_Ref($result), $image);
            if (false === $result) {
                $ret = false;
            }
        }
        return $ret;
    }

    /**
     * check if use Legacy_Activity
     *
     * @param mixed[]	$conf
     *
     * @return	bool
     */
    protected function _isActivityClient(/*** mixed[] ***/ $conf)
    {
        $key ='activity';
        if (! isset($this->_mClientConfig[$key])) {
            return false;
        }
        if (! isset($conf[$this->_mClientConfig[$key]])) {
            return false;
        }
        return 1 == $conf[$this->_mClientConfig[$key]] ? true : false;
    }

    /**
     * check if use Legacy_Tag
     *
     * @param mixed[]	$conf
     *
     * @return	bool
     */
    protected function _isTagClient(/*** mixed[] ***/ $conf)
    {
        $key ='tag';
        if (! isset($this->_mClientConfig[$key])) {
            return false;
        }
        if (! isset($conf[$this->_mClientConfig[$key]])) {
            return false;
        }
        return $conf[$this->_mClientConfig[$key]] ? true : false;
    }

    /**
     * check if use Legacy_Workflow
     *
     * @param mixed[]	$conf
     *
     * @return	bool
     */
    protected function _isWorkflowClient(/*** mixed[] ***/ $conf)
    {
        $key ='workflow';
        if (! isset($this->_mClientConfig[$key])) {
            return false;
        }
        if (! isset($conf[$this->_mClientConfig[$key]])) {
            return false;
        }
        return $conf[$this->_mClientConfig[$key]] ? true : false;
    }

    /**
     * check if use Legacy_Image
     *
     * @param mixed[]	$conf
     *
     * @return	bool
     */
    protected function _isImageClient(/*** mixed[] ***/ $conf)
    {
        $key ='image';
        if (! isset($this->_mClientConfig[$key])) {
            return false;
        }
        if (! isset($conf[$this->_mClientConfig[$key]])) {
            return false;
        }
        return $conf[$this->_mClientConfig[$key]] ? true : false;
    }

    /**
     * check if use Legacy_Map
     *
     * @param mixed[]   $conf
     *
     * @return  bool
     */
    protected function _isMapClient(/*** mixed[] ***/ $conf)
    {
        $key ='map';
        if (! isset($this->_mClientConfig[$key])) {
            return false;
        }
        if (! isset($conf[$this->_mClientConfig[$key]])) {
            return false;
        }
        return 1 == $conf[$this->_mClientConfig[$key]] ? true : false;
    }

    /**
     * get client field name
     *
     * @param string	$key
     *
     * @return	string
     */
    public function getClientField(/*** string ***/ $key)
    {
        return $this->_mClientField[$key];
    }
}
