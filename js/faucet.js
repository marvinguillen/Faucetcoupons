function getBalance(){
    //NOT COMPLETED TEST VARIABLE
    var address = "5NbCTMansKp1AmRUV9sxxcBJEi4avk3dt7RsXsxo6vFVSqZCTEsuCgXTiQZCsKM5TdGQD2m6UpM58KoDLEtX7ofH61t9hNZ";

    $.post('./getBalance.php',
    {
        user_address : address
    }).done(function(data){

        if(data.status == 404)
        {
            alert(data.message);
        }
        else{
            $("#balance").innerHTML = data.wallet_balance;
            $("#unlock-balance").innerHTML = data.wallet_unlock;
            $("#total").innerHTML = data.wallet_total;
        }
    });
}


$(document).ready(function(){
    //start once page is load
    getBalance();
});