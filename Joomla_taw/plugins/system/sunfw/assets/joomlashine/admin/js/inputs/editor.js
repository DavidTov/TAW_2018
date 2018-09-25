var InputEditor=api.InputEditor=extendReactClass('MixinInput',{render:function(){return React.createElement('div',{key:this.props.id||api.Text.toId(),className:'form-group '+(this.props.control.className?this.props.control.className:'')},React.createElement('label',null,this.label,this.tooltip),React.createElement('textarea',{ref:'field',name:this.props.setting,value:this.state.value,onChange:this.change,disabled:this.props.disabled,className:'hidden'}),React.createElement('a',{onClick:this.popupForm,disabled:this.props.disabled,className:'btn btn-default btn-block'+(this.props.disabled?' disabled':'')},api.Text.parse(this.props.control.buttonText?this.props.control.buttonText:'set-html-content')));},popupForm:function(){var href=api.urls.ajaxBase+'&context=editor&format=html';if(this.props.control.editor){href+='&editor='+this.props.control.editor;}var modal=api.Modal.get({id:'html_content_modal',type:'iframe',title:this.props.control.modalTitle?this.props.control.modalTitle:'html-content',width:'90%',height:'90%',content:{src:href,height:'100%',width:'100%'},buttons:[{text:'ok',onClick:function(event){var modal=event.target.parentNode;while(modal&&!modal.classList.contains('modal-content')&&modal.nodeName!='BODY'){modal=modal.parentNode;}var iframeWindow=modal.querySelector('iframe').contentWindow;var textArea=iframeWindow.document.getElementById('editor');var content;if(textArea&&textArea.style.display!='none'){content=iframeWindow.document.getElementById('editor').value;}else if(iframeWindow.tinyMCE!==undefined){content=iframeWindow.tinyMCE.activeEditor.getContent();}else if(iframeWindow.CodeMirror!==undefined){content=iframeWindow.Joomla.editors.instances['editor'].getValue();}this.setState({value:content});this.change(this.props.setting,content);api.Modal.hide();}.bind(this),className:'btn btn-primary'},{text:'cancel',onClick:api.Modal.hide,className:'btn btn-default'}]}),setContent=function(){if(modal.refs.iframe){if(modal.refs.iframe.contentWindow){if(modal.refs.iframe.contentWindow.sunFwEditorSetContent){return modal.refs.iframe.contentWindow.sunFwEditorSetContent(this.state.value);}}}setTimeout(setContent,100);}.bind(this);setContent();}});