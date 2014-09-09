$(function () {
    $('#submit').click(function () {
        pass=md5('123ab'+$('#password').val());
        var set = false;
        set = validateEmpty($("#username").val());
        if (!validateEmpty($("#username").val())) {
            //$('#labelnoKtp').text('No Ktp tidak boleh kosong').addClass('red').removeClass('green');
			alert('Username tidak boleh kosong');
        }
        else {
            set = true;
        }

        if (!validateEmpty($("#password").val())) {
            //$('#labelPassword').text('Password tidak boleh kosong').addClass('red').removeClass('green');
			alert('Password tidak boleh kosong');
        }
        else {
            set = true;
        }

        if (set == true) {
			
            var data = "userid=" + $("#username").val() + "&passport=" + pass+'_'+ $("#username").val() + "&challenge="+"123ab"+"&appid="+"EKS1"+"&ipaddr="+"172.30.93.220";
            $.get('https://bais.ub.ac.id/api/login/xmlapi/?', data).done(function (result) {
               alert('masuk');
            }).fail(function () {
                alert("Terjadi Kesalahan");
            });
        }
    });
});

    function validateEmpty(text) {
        if (text.length == 0) {
            return false;
        }
        else {
            return true;
        }
    }