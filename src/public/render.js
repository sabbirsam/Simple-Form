jQuery($ => {
    const escapeEl = document.createElement("textarea");
    const code = document.getElementById("simple_form_render");
    const data = document.getElementById("render_data_Id").innerHTML;

    // const latlong = data.replace(/[\[\]']+/g,'');
    
    // alert(latlong);


    // const formData = latlong;

    const formData = data;
    
    const addLineBreaks = html => html.replace(new RegExp("><", "g"), ">\n<");
  
    // Grab markup and escape it
    const $markup = $("<div/>");
    $markup.formRender({ formData });
  
    // set < code > innerText with escaped markup
    code.innerHTML = addLineBreaks($markup.formRender("html"));

  });