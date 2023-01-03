$(document).ready(function(){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $('select[name="province_destination"]').on('change', function(){
        let provinceId = $(this).val();
        if (provinceId) {
            $.ajax({
                url: '/province/'+provinceId+'/cities',
                type: "GET",
                dataType: "json",
                success: function(data){
                    $('select[name="city_destination"]').empty();
                    $.each(data, function(key, value){
                        $('select[name="city_destination"]').append('<option value="'+ key +'">' + value + '</option> ');
                    });
                },
            });
        } else {
            $('select[name="city_destination"]').empty();
        }
    });


    $("#ongkir").submit(function(e){
        e.preventDefault();
        var urls = '/Checkout/submit';

        $.ajax({
            url: urls,
            type: 'post',
            data: $(this).serialize(),
            success: function(data){
                // $(".nasi").hide();

                //menampilkan tabel ongkos kirim
                document.getElementById("shipping_card").innerHTML = data;
                var province = $('.province option:selected').text();
                var kota = $('.destination option:selected').text();
                var courier = $('.courier option:selected').text();
                var address = $('.address').val();
                var zipCode = $('.zip_code').val();
                var berat = $('.berat').val();

                $('.tujuan-provinsi').val(province);
                $('.tujuan-kota').val(kota);
                $('.kurir').val(courier);
                $('.berat-barang').val(berat);


                $(".check-box").on('change' ,function(){

                    //Checkbox hanya bisa di check 1 checkbox
                    $('.check-box').not(this).prop('checked', false);

                    //convert Integer ke Rupiah
                    function convertToRupiah(angka)
                    {
                        var rupiah = '';
                        var angkarev = angka.toString().split('').reverse().join('');
                        for(var i = 0; i < angkarev.length; i++) if(i%3 == 0) rupiah += angkarev.substr(i,3)+'.';
                        return 'Rp. '+rupiah.split('',rupiah.length-1).reverse().join('');
                    }

                    var currow = $(this).closest("tr");

                    //ngambil harga ongkir pada tabel
                    var col5 = currow.find('#kmm').val();

                    //ongkir dari tabel
                    var result = col5.replace(/^\D+/g, '');

                    //ongkir pada Review Order
                    var ongkir = $(".ongkirs");

                    ongkir.val(result);

                    //inputan hidden harga di cart
                    var order = $(".bpbp").val();

                    // ongkir + total order
                    var hasil = parseInt(result) + parseInt(order);

                    // button submit
                    var btn_submit =$('<button type="submit" class="btn btn-primary mt-3 float-right">Submit</button>');

                    // --------------------------Hasil Inputan-------------------------- //
                    $(".big-total").text(convertToRupiah(hasil));
                    $("#hidden-total").val(hasil);
                    $('#hidden-ongkir').val(result);
                    ongkir.text(convertToRupiah(result));
                    console.warn(hasil);
                    $(".submit-2").html(btn_submit);





                });
            },
            error: function (xhr, eror, status){
                var err = eval("(" + xhr.responseText + ")");
                alert("Silahkan masukan Shipping Addresnya");
            }
        });
    });


    $(window).on('popstate', function() {
        alert('Back button was pressed.');
      });




});
