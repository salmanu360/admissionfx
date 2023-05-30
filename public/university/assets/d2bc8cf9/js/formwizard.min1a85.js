if("undefined"==typeof jQuery)throw new Error("jQuery plugins need to be before formizard.js file.");$.formwizard={triggerEvent:(e,t,r)=>{$(t).trigger(e,r)},currentButtonTarget:null,resetCurrentTarget:!0,observerObj:null,fields:[],previewHeadings:[],previewEmptyText:"",options:[],submit:!1,helper:{showMessage:e=>{alert(e)},removeField:e=>{let t=$(e).closest("form").attr("id"),r=$.formwizard.helper.currentIndex("#"+t),i=$(e).attr("id"),a=$.formwizard.fields[t][r];$.formwizard.fields[t][r]=$.grep(a,function(e){return e!=i})},clearField:e=>{$(e).val("")},addField:(e,t,r)=>{$.formwizard.fields[e][r].push(t.id)},shake:function(e){$(e+" .sw-main").addClass("shake animated"),setTimeout(function(){$(e+" .sw-main").removeClass("shake animated")},1e3)},appendButtons:function({form:e,labelNext:t,labelPrev:r,labelFinish:i,labelRestore:a,iconNext:o,iconPrev:s,iconFinish:n,iconRestore:d,classNext:l,classPrev:f,classFinish:c,classRestore:u,enablePersistence:p=!1}){let m=[];p&&m.push($('<button class="formwizard_restore" type="button"/></button>').html(d+"&nbsp;"+a).addClass(u)),m.push($('<button class="formwizard_prev"></button>').html(s+"&nbsp;"+r).addClass(f).on("click",function(e){e.preventDefault(),$.formwizard.formNavigation.previous(e.target)}));let w=$('<button class="formwizard_next"></button>').html(t+"&nbsp"+o).addClass(l);m.push(w);let h=$('<button class="formwizard_finish" type="submit"/></button>').html(n+"&nbsp;"+i).addClass(c);m.push(h);var v=w.add(h);return $(v).on("click",function(t){t.preventDefault(),setTimeout(function(){if($(e).yiiActiveForm("data").attributes.length)return $.formwizard.formValidation.run(e,t);$(t.target).hasClass("formwizard_finish")&&$(e).yiiActiveForm("submitForm"),$.formwizard.formNavigation.next(t.target)},200)}),m},updateButtons:function(e){$(e).on("showStep",function(t,r,i,a,o){let s=$(e+" > .sw-toolbar > .sw-btn-group-extra button.formwizard_prev"),n=$(e+" > .sw-toolbar > .sw-btn-group-extra >button.formwizard_finish"),d=$(e+" > .sw-toolbar > .sw-btn-group-extra >button.formwizard_next ");"first"===o?(s.addClass("disabled"),n.addClass("hidden d-none"),d.removeClass("hidden d-none")):"final"===o?(d.addClass("hidden d-none"),n.removeClass("hidden d-none"),s.removeClass("disabled hidden d-none"),$.formwizard.previewStep.add(e)):(s.removeClass("disabled"),d.removeClass("disabled hidden d-none"),n.addClass("hidden d-none"))})},currentIndex:function(e){return $(e+" ul.step-anchor>li.active").index()}},previewStep:{add:e=>{let t=$.formwizard.options,r=$(e).closest("form").attr("id"),i=document.createDocumentFragment(),a=$.formwizard.helper.currentIndex("#"+r),o=document.querySelector("#step-"+a),s=t[r].bsVersion,n=t[r].classListGroup,d=t[r].classListGroupHeading;if(o.querySelectorAll("."+n).forEach(e=>{e.remove()}),t.hasOwnProperty(r)&&t[r].enablePreview){$.formwizard.fields[r].forEach(function(a,o){let l=document.createElement("div");l.setAttribute("class",n+" preview-container"),l.dataset.step=o;let f=$(e).find("#step-"+o).data("step").type,c=""==$.formwizard.previewHeadings[o]?"Step "+parseInt(o+1):$.formwizard.previewHeadings[o],u='<h4 class="'+d+'">'+c+"</h4>";a.forEach(function(i,n){let d=$.formwizard.previewStep.getLabel(i),l=$.formwizard.previewStep.getValue(r,i),c={label:""==d?$.formwizard.previewEmptyText:d,value:""==l?$.formwizard.previewEmptyText:l,target:i};if("hidden"!==$("#"+r+" #"+i).attr("type")&&(u+=$.formwizard.previewStep.getTemplate(c,s,t[r])),"tabular"==f){let t=$(e).find("#step-"+o).find(".fields_container .tabular-row").length;divider=a.length/t,(n+1)%divider==0&&(u+='<hr class="tabular-divider" />')}}),l.innerHTML=u,i.appendChild(l)}),o.appendChild(i),$(".preview-button").on("click",function(t){let r=$(this).closest("div.preview-container").data("step");$.formwizard.formNavigation.goToStep(e,r),$.formwizard.previewStep.highlightTarget($(this).val())})}},getLabel:e=>{let t=$("#"+e).siblings("label").text();return""!==t?t:$("#"+e).attr("placeholder")},getValue:(e,t)=>{let r=$("#"+e+" #"+t),i=function(){if(""!==$.formwizard.previewEmptyText){let r=$("#"+e+" #"+t+" option:selected").val(),i=$("#"+e+" #"+t+" option:selected").text();return""==r?"NA"==$.formwizard.previewEmptyText?i:$.formwizard.previewEmptyText:$("#"+e+" #"+t+" option:selected").text()}return $("#"+e+" #"+t+" option:selected").text()},a=function(){let e=r.find("input:checked");return e.length?e.val():""},o=function(){let e=r.find("input:checked"),t="";return e.each(function(e,r){t+=$(r).val()+","}),t},s=function(){return r.is(":checked")?r.val():""},n=function(){return r.get(0).files.length+" files"};return r.is("select")?i():r.is("div")&&"radiogroup"==r.attr("role")?a():r.is("div")?o():"checkbox"==r.attr("type")?s():"file"==r.attr("type")?n():r.val()},getTemplate:(e,t,r)=>{let i=4==t?"list-group-item-action":"";return`<button type="button" class="list-group-item ${r.classListGroupItem} ${i} preview-button" value="${e.target}">\n                    <span class="badge ${r.classListGroupBadge}">\n                        ${e.label}\n                    </span>\n                    ${e.value}\n                    </button>`},highlightTarget:function(e){$(".field-"+e).addClass("notify-target"),setTimeout(function(){$(".field-"+e).removeClass("notify-target")},2e3)}},formValidation:{run:function(e,t){$.formwizard.resetCurrentTarget=!1,$.formwizard.currentButtonTarget=t.target,$(e).yiiActiveForm("validate",!0)},bindAfterValidate:function(e){$(e).on("beforeValidate",function(t,r,i){let a=$(this).attr("id"),o=$.formwizard.helper.currentIndex(e);const s=$("#step-"+o).data("step").skipable;let n=!0;$("#step-"+o+" .fields_container").find(":input").each(function(e,t){if(inputTypes={text:function(e){if(""!==$(e).val())return!1},radio:function(e){return!$(e).is(":checked")},"select-one":function(e){if(""!==$(e).val())return!1},"select-multiple":function(e){if(""!==$(e).val())return!1},number:function(e){if(""!==$(e).val())return!1},range:function(e){if(""!==$(e).val())return!1},password:function(e){if(""!==$(e).val())return!1},file:function(e){if(""!==$(e).val())return!1}},inputTypes.hasOwnProperty(t.type)&&!1===inputTypes[t.type].call(this,t))return n=!1,!1}),s&&n&&$.each($.formwizard.fields[a][o],function(e,t){$("#"+a).yiiActiveForm("remove",t)})}).on("afterValidate",function(t,r,i){$.formwizard.resetCurrentTarget&&($.formwizard.currentButtonTarget=null),t.preventDefault();let a=$(this).attr("id"),o=$.formwizard.helper.currentIndex(e);const s=o==$(e+" .step-anchor").find("li").length-1,n=$.formwizard.options[a].enablePreview&&s,d=$("#step-"+o).data("step").skipable;let l=n||d?0:$.formwizard.fields[a][o].diff(r);if(!$.formwizard.formValidation.editModeErrors(a,r)){if(l.length)!1===$.formwizard.resetCurrentTarget&&$.formwizard.helper.shake(e);else{if(s)return $.formwizard.submit=!0,!0;$(e).yiiActiveForm("resetForm"),null!==$.formwizard.currentButtonTarget&&$.formwizard.formNavigation.next($.formwizard.currentButtonTarget)}return!1}}).on("beforeSubmit",function(e){return e.preventDefault(),!!$.formwizard.submit&&($.formwizard.persistence.clearStorage(),!0)})},editModeErrors:function(e,t){if($.formwizard.options[e].editMode){let r=$.formwizard.fields[e],i=[];$.each(r,function(e,r){!$("#step-"+e).data("step").skipable&&r.diff(t).length&&i.push(e)});let a=$.formwizard.options[e].wizardContainerId;if($("#"+a).smartWizard("updateErrorStep",i),i.length)return $.formwizard.formNavigation.goToStep("#"+a,i[0]),!0}},isValid:function(e){for(var t in e)if(e[t].length>0)return!0;return!1},updateErrorMessages:function(e,t){for(var r in t)if(t[r].length){let i=r.replace(/\-([0-9]+)/g,"");$(e).yiiActiveForm("updateAttribute",i,t[r])}},addField:(e,t)=>{$("#"+e).yiiActiveForm("add",t)},removeField:e=>{let t=$(e).closest("form").attr("id");$("#"+t).yiiActiveForm("remove",e.id)}},formNavigation:{next:e=>{let t=$(e).parent().closest(".sw-main").attr("id");$("#"+t).smartWizard("next")},goToStep:(e,t)=>{$(e).smartWizard("goToStep",t)},previous:e=>{let t=$(e).parent().closest(".sw-main").attr("id");$("#"+t).smartWizard("prev")}},observer:{start:function(e){var t=document.querySelector(e);$.formwizard.observerObj=$.formwizard.observer.observerInstance(e);$.formwizard.observerObj.observe(t,{childList:!0,attributes:!0,subtree:!1})},observerInstance:function(e){return new MutationObserver(function(t){t.forEach(function(t){"childList"==t.type&&(void 0!==$.themematerial&&$.themematerial.init(),$.formwizard.init(e),$.formwizard.observerObj.disconnect())})})}},tabular:{addRow:e=>{let t=$(e).siblings(".fields_container"),r=t.find(".tabular-row").length;if(r===t.data("rows-limit"))return void $.formwizard.helper.showMessage("Cannot add any more.");let i=document.createDocumentFragment(),a=$(t)[0].firstChild,o=$(e).closest("form").attr("id"),s=$.formwizard.helper.currentIndex("#"+o),n=$.formwizard.tabular,d=$(a).find("input,select,textarea"),l=$.formwizard.triggerEvent;d.each(function(e,t){void 0!==$(t).attr("id")&&l("formwizard.beforeClone","#"+o+" #step-"+s+" #"+t.id)}),i.appendChild(a.cloneNode(!0)),d.each(function(e,t){void 0!==$(t).attr("id")&&l("formwizard.afterClone","#"+o+" #step-"+s+" #"+t.id)});let f=i.querySelector("div.tabular-row");f.id=f.id.replace(/\_[^\_]+$/,"_"+parseInt(r));let c=[];i.querySelectorAll("input,select,textarea").forEach(function(e,t){let i=e.id;if(n.updateFieldAttributes(e,r),void 0!==$(e).attr("id")){let t=n.setFieldDefaults(e,o,i);$.formwizard.helper.addField(o,e,s),c.push(e.id),void 0!==t&&$.formwizard.formValidation.addField(o,t)}}),$(t)[0].appendChild(i),document.querySelector("#row_"+r+" i.remove-row").dataset.rowid=r,l("formwizard.afterInsert","#"+o+" #step-"+s+" #row_"+r,{rowIndex:r})},removeRow:e=>{let t=$("#row_"+e),r=1==t.closest(".fields_container").find(".tabular-row").length;t.find("textarea,input,select").each(function(e,t){if(r)return $.formwizard.helper.clearField(t);$.formwizard.helper.removeField(t),$.formwizard.formValidation.removeField(t)}),!r&&t.remove()},setFieldDefaults:(e,t,r)=>{let i,a=e.name.match(/(\[[\d]{0,}\].*)/),o=$("#"+t).yiiActiveForm("find",r);return void 0!==o&&(i={id:e.id,name:a[0],container:".field-"+e.id,input:"#"+e.id,error:".help-block.help-block-error",value:e.value,status:0,validate:o.hasOwnProperty("validate")?o.validate:function(e,t,r,i,a){}}),i},updateFieldAttributes:(e,t)=>{let r=$(e).parent().hasClass("field-"+e.id);if(void 0!==$(e).attr("id")&&(e.id=e.id.replace(/\-([\d]+)\-/,"-"+parseInt(t)+"-")),e.name=e.name.replace(/\[([\d]+)\]/,"["+parseInt(t)+"]"),e.value="",r){let t=$(e).parent();$(t).removeClassesExceptThese(["form-group","required"]),$(t).addClass("field-"+e.id),$(t).find("label").attr("for",e.id),$(t).find(".help-block").html("")}}},init:e=>{$(e).on("click",".remove-row",function(e){$.formwizard.tabular.removeRow($(this).data("rowid"))}),$(e+" .add_row").on("click",function(e){$.formwizard.tabular.addRow($(this))}),$(e).find(":input:not(button)").on("blur change",function(e){e.preventDefault(),$.formwizard.resetCurrentTarget=!0})},persistence:{assign:(e,t,r)=>{lastKeyIndex=t.length-1;for(var i=0;i<lastKeyIndex;++i)key=t[i],key in e||(e[key]={}),e=e[key];e[t[lastKeyIndex]]=r},storageFields:{},savefield:(e,t,r)=>{let i=e.id,a=$(e).get(0).type,o=r.number,s=r.type;$.formwizard.persistence.storageFields.hasOwnProperty("step-"+o)||($.formwizard.persistence.storageFields["step-"+o]={stepType:s,fields:{}});let n={"select-one":e=>{if("tabular"==$.formwizard.persistence.storageFields["step-"+o].stepType){let r=$("#"+t+" #"+e).closest("div.tabular-row").attr("id");$.formwizard.persistence.storageFields["step-"+o].fields.hasOwnProperty(r)||($.formwizard.persistence.storageFields["step-"+o].fields[r]={}),$.formwizard.persistence.storageFields["step-"+o].fields[r][e]=document.querySelector("#"+t+" #"+e).value}else $.formwizard.persistence.storageFields["step-"+o].fields[e]=document.querySelector("#"+t+" #"+e).value},text:function(e){if("tabular"==$.formwizard.persistence.storageFields["step-"+o].stepType){let r=$("#"+t+" #"+e).closest("div.tabular-row").attr("id");$.formwizard.persistence.storageFields["step-"+o].fields.hasOwnProperty(r)||($.formwizard.persistence.storageFields["step-"+o].fields[r]={}),$.formwizard.persistence.storageFields["step-"+o].fields[r][e]=document.querySelector("#"+t+" #"+e).value}else $.formwizard.persistence.storageFields["step-"+o].fields[e]=document.querySelector("#"+t+" #"+e).value},radio:e=>{let r=$("#"+t+" #"+e).closest('div[role="radiogroup"]').find("input:radio");if("tabular"==$.formwizard.persistence.storageFields["step-"+o].stepType){let i=$("#"+t+" #"+e).closest("div.tabular-row").attr("id");$.formwizard.persistence.storageFields["step-"+o].fields.hasOwnProperty(i)||($.formwizard.persistence.storageFields["step-"+o].fields[i]={}),r.length?r.each(function(e,t){$.formwizard.persistence.storageFields["step-"+o].fields[i][t.id]=t.checked}):$.formwizard.persistence.storageFields["step-"+o].fields[i][e]=$("#"+t+" #"+e).is(":checked")}else r.length?r.each(function(e,t){$.formwizard.persistence.storageFields["step-"+o].fields[t.id]=t.checked}):$.formwizard.persistence.storageFields["step-"+o].fields[e]=$("#"+t+" #"+e).is(":checked")},checkbox:e=>{let r=$("#"+t+" #"+e).attr("name").match(/\[\]$/g);if("tabular"==$.formwizard.persistence.storageFields["step-"+o].stepType){let i=$("#"+t+" #"+e).closest("div.tabular-row").attr("id");if($.formwizard.persistence.storageFields["step-"+o].fields.hasOwnProperty(i)||($.formwizard.persistence.storageFields["step-"+o].fields[i]={}),r.length){$("input[name='"+$("#"+t+" #"+e).attr("name")+"']").each(function(e,t){$.formwizard.persistence.storageFields["step-"+o].fields[i][t.id]=t.checked})}else $.formwizard.persistence.storageFields["step-"+o].fields[i][e]=$("#"+t+" #"+e).is(":checked")}else if(r&&r.length){$("input[name='"+$("#"+t+" #"+e).attr("name")+"']").each(function(e,t){$.formwizard.persistence.storageFields["step-"+o].fields[t.id]=t.checked})}else $.formwizard.persistence.storageFields["step-"+o].fields[e]=$("#"+t+" #"+e).is(":checked")}};n.hasOwnProperty(a)&&n[a].call(this,i),localStorage.setItem("formwizard."+t,JSON.stringify($.formwizard.persistence.storageFields))},clearStorage:()=>{for(var e in localStorage)0==e.indexOf("formwizard.")&&localStorage.removeItem(e);$.formwizard.persistence.storageFields={}},loadForm:e=>{$.formwizard.persistence.storageFields=JSON.parse(localStorage.getItem("formwizard."+e));let t=$.formwizard.persistence.storageFields,r={"select-one":(t,r)=>{document.querySelector("#"+e+" #"+t).value=r,$("#"+t).trigger("change"),$.formwizard.triggerEvent("formwizard."+e+".afterRestore","#"+e+" #"+t,{fieldId:t,fieldValue:r})},text:function(t,r){document.querySelector("#"+e+" #"+t).value=r,$.formwizard.triggerEvent("formwizard."+e+".afterRestore","#"+e+" #"+t,{fieldId:t,fieldValue:r})},radio:(t,r)=>{document.querySelector("#"+e+" #"+t).checked=r,$.formwizard.triggerEvent("formwizard."+e+".afterRestore","#"+e+" #"+t,{fieldId:t,fieldValue:r})},checkbox:(t,r)=>{document.querySelector("#"+e+" #"+t).checked=r,$.formwizard.triggerEvent("formwizard."+e+".afterRestore","#"+e+" #"+t,{fieldId:t,fieldValue:r})}};for(let e in t)if(t.hasOwnProperty(e)){let i=t[e];if("tabular"==i.stepType){$.formwizard.persistence.tabularData(i,e,r);continue}let a=i.fields;for(let e in a)if(a.hasOwnProperty(e)){let t=a[e],i=$("#"+e).get(0).type;r.hasOwnProperty(i)&&r[i].call(this,e,t)}}},tabularData:function(e,t,r){let i=e.fields,a=Object.keys(i).length;if(a>1)for(let e=1;e<=a-1;e++)$("#"+t+" .add_row").trigger("click");for(let e in i)if(i.hasOwnProperty(e)){let t=i[e];for(let e in t)if(t.hasOwnProperty(e)){let i=t[e],a=$("#"+e).get(0).type;r.hasOwnProperty(a)&&r[a].call(this,e,i)}}},init:e=>{$(document).on("change","#"+e+" :input",function(t){let r=$(this).closest("div.step-content").data("step");$.formwizard.persistence.savefield(t.currentTarget,e,r)}),$("#"+e+" button.formwizard_restore").on("click",function(t){t.preventDefault(),$.formwizard.persistence.loadForm(e)})}}},Array.prototype.classDiff=function(e){return this.filter(function(t){return e.indexOf(t)<0})},$.fn.removeClassesExceptThese=function(e){var t=$(this);if(t.length>0){var r=t.attr("class").split(" ").classDiff(e);t.removeClass(r.join(" ")).addClass(e.join(" "))}return t},Array.prototype.diff=function(e){var t=[];for(var r in this)this.hasOwnProperty(r)&&e.hasOwnProperty(this[r])&&e[this[r]].length>0&&t.push(this[r]);return t};