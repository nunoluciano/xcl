/* onmessage = (event) => {
  importScripts('<{$xoops_url}>/common/js/highlight/highlight.pack.js');
  const result = self.hljs.highlightAuto(event.data);
  postMessage(result.value);
}; */
onmessage = (event) => {
  importScripts('//cdnjs.cloudflare.com/ajax/libs/highlight.js/10.0.3/highlight.min.js')
  const result = self.hljs.highlightAuto(event.data)
  postMessage(result.value);
};
