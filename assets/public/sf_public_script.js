(function ($) {
  $(document).ready(function () {
    $('button[class^="qbf-submit"]').click(function () {
      var input = [];
      $('input[name^="qbf_text_input_field"]').each(function () {
        input.push($(this).val());
      });

      var number = [];
      $('input[name^="qbf_num"]').each(function () {
        number.push($(this).val());
      });
      // console.log(number);
      var email = [];
      $('input[name^="qbf_field_email"]').each(function () {
        email.push($(this).val());
      });

      var select = [];
      $('select[name^="qbf_select"] :selected').each(function () {
        select.push($(this).val());
      });

      var textarea = [];
      $('textarea[name^="qbf_text_area"]').each(function () {
        textarea.push($(this).val());
      });

      var radio = [];
      $('input[name^="qbf_radio_group"]:checked').each(function () {
        radio.push($(this).val());
      });
      var date = [];
      $('input[name^="qbf_date"]').each(function () {
        date.push($(this).val());
      });
      var checkbox = [];
      $('input[name^="qbf_checkbox"]:checked').each(function () {
        checkbox.push($(this).val());
      });
      var myfile = [];
      $('input[name^="qbf_myFile"]').each(function () {
        myfile.push($(this).val());
      });

      $.post(
        SFSF_contact_form_submission.ajaxurl,
        {
          action: "SFSF_contact_form_submission",
          data_id_val: $(this).attr("data-id"),
          input: input,
          number: number,
          email: email,
          textarea: textarea,
          select: select,
          radio: radio,
          date: date,
          checkbox: checkbox,
          myfile: myfile,
        },
        function (data) {
          console.log(data);

          Swal.fire("Complete!", "Thanks for information!", "success");

          $("form").trigger("reset"); //reset
        }
      );
      return false;
    });
  });
})(jQuery);
