$(document).ready(function () {

    // transportasi
    function harga(){
        $hgRental = $('#hg-rental').html();
        $hgWisata = $('#hg-wisata').html();
        $hgResto = $('#hg-resto').html();
        $hgHotel = $('#hg-hotel').html();
        $hgTrans = $('#hg-trans').html();

    }

    harga();
    disable();
    $('.row-wisata').click(function(){
        disable();
    })
    $('input[name=transportation]').click(function () {
        $('#hg-trans').html($(this).val());
        $hgTrans = $('#hg-trans').html();
        // total()
    });

    $('.transportation').click(function (){
        $nama = $(this).find('h6').html();
        $('#nm-trans').html($nama);
        
    });

    // hotel
    $('input[name=hotel]').click(function () {
        // $harga = 
        // $('#hg-hotel').html($(this).find(":selected").val(););
        // alert($nama);
        // $kelas = "";
        // $('#hg-hotel').html($kelas)
        
        // alert($kelas);

    });

    $('.hotel').click(function (){

        $kelas = $(this).find(":selected").val();
        $nama = $(this).find('h6').html();
        $('#nm-hotel').html($nama);
        $kelas1 = $kelas;
        $(this).find('.price').html($kelas1);
       $('#hg-hotel').html($kelas1);
        $hgHotel = $('#hg-hotel').html();

        $(this).find('.kelas').change(function(){
            $kelas = $(this).find(":selected").val();
            
        });
       

    });

    


    $('input[name=restaurant]').click(function () {
        $('#hg-resto').html($(this).val());
        $hgResto = $('#hg-resto').html();
    });

    $('.resto').click(function (){
        $nama = $(this).find('h6').html();
        $('#nm-resto').html($nama);
       
    });

    $('input[name=wisata]').click(function () {
        $('#hg-wisata').html($(this).val());
        $hgWisata = $('#hg-wisata').html();
    });

    $('.wisata').click(function (){
       
        $nama = $(this).find('h6').html();
        $('#nm-wisata').html($nama);
    });

    $('input[name=rental]').click(function () {
        $('#hg-rental').html($(this).val());
        $hgRental = $('#hg-rental').html();
    });

    

    

    $('.rental').click(function (){
        $nama = $(this).find('h6').html();
        $('#nm-rental').html($nama);
       
        
    });

    $('#orang').change(function(){
        $jmOrang = $('#jmOrang').html($('#orang').val());
    })

    function total() {
        $jmOrang = parseInt($('#jmOrang').html());
        $total = parseInt($hgHotel) + parseInt($hgResto) + parseInt($hgTrans) + parseInt($hgWisata) + parseInt($hgRental);  
        $('#hg-total').html($total*$jmOrang);
        $totalHarga = $('#hg-total').html();
        

    }

    function disable(){
        if(parseInt($hgHotel) == 0 || parseInt($hgResto) == 0 || parseInt($hgTrans) == 0 || parseInt($hgWisata) == 0){
            $('#tmbl').prop("disabled", true);
        }
    
        else{
            $('#tmbl').prop("disabled", false);
        }
    }
    

    $('#tmbl').click(function () {
        total();
        // $totalHarga = 500000;
        // $totalHarga = $totalHarga;
        $('#totalHarga').html($totalHarga);
    })


    $(function () {
        $('#datetimepicker1').datetimepicker();
    });
});
var nav = document.querySelector('nav');

window.addEventListener('scroll', function () {
    if (window.pageYOffset > 250) {
        nav.classList.add('bg-hitam', 'shadow');
    } else {
        nav.classList.remove('bg-hitam', 'shadow');
    }
});