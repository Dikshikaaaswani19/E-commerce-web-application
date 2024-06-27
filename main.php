<script src="https://code.jquery.com/jquery-3.6.1.js"
 integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>

<!-- <input type="text" name="name" placeholder="Enter Name :" id="name"><br><br> -->

<script>
    <?php
        include 'config.php';
        $select_product=mysqli_query($conn,"select * from `orders` where id=28") or die('query faild');
        $fetch=mysqli_fetch_assoc($select_product);
    ?>
        var name = $("#<?php echo $fetch['name']?>").val();
        var amount = $("#<?php echo $fetch['total_price']?>").val();
        var options = {
    "key": "rzp_test_dpTrvksozDWVJ2", // Enter the Key ID generated from the Dashboard
    "amount": <?php echo $fetch['total_price']?>*100, // Amount is in currency subunits. Default currency is INR. Hence, 50000 refers to 50000 paise
    "currency": "INR",
    "name": "<?php echo $fetch['name']?>",
    "description": "Test Transaction",
    "image": "data:image/jpeg;base64,/9j/4AAQSkZJRgABAQAAAQABAAD/2wBDAAsJCQcJCQcJCQkJCwkJCQkJCQsJCwsMCwsLDA0QDBEODQ4MEhkSJRodJR0ZHxwpKRYlNzU2GioyPi0pMBk7IRP/2wBDAQcICAsJCxULCxUsHRkdLCwsLCwsLCwsLCwsLCwsLCwsLCwsLCwsLCwsLCwsLCwsLCwsLCwsLCwsLCwsLCwsLCz/wAARCAClAJUDASIAAhEBAxEB/8QAHAABAQADAAMBAAAAAAAAAAAAAAEGBwgCAwUE/8QAQBAAAQMDAQMHBgwGAwAAAAAAAQACAwQFEQYSIVEHExciMUGUFFNhZXHTFSMyVnKBgpGV0dLUJEJSVaGxM0Zm/8QAFAEBAAAAAAAAAAAAAAAAAAAAAP/EABQRAQAAAAAAAAAAAAAAAAAAAAD/2gAMAwEAAhEDEQA/ANtoiIHFFeKiAiIgIqiCIiICIiAiIgIiqCIqiCIiICIiC8VE4r1zTQ08M08z2shhjfNM925rI2NL3OPsAyg9m5Foyt5WNTurKx1BHQx0Rmf5KyanL5Wwg4btu28bRG8+1fn6Vda+rfCH3iDfii0J0ra19W+EP606Vta+rfCH9aDfaLQnStrX1b4Q+8TpW1r6t8If1oN9otCdK2tfVvhD+tOlbWvq3wh/Wg32m5aE6VtberfCH9a23pKq1FX2iC4XzmW1Faefghgi5oQ0pA2C8Ek5d8rt7CEGQKqIgqKIgIiICIiBxXwdU2e5X20y2uiroqNtS9gqpJInyOfA07XNt2XDGSBn0bu9ff4qINOdDlb/AH2n8HJ7xOhyt/vtP4OT3i3GiDTZ5HK8A7N8pi7uDqSUA+0iQ/6WMXzk/wBW2Nj55KZlXSMBL6i3udMI2798kZaJB6TskDiui0Qcj4QLb3KNoaBsNRqKzwNjMeZbrSxNwxzD8qpjaNwI/nGOzrbsHa1Cg2HZOTZt/t1LcqG/wczMNl7HUcgkhmaBtxPHOdrT94we9fS6HK3++0/g5PeL8nJLeJKa71dne4+T3KB00TSdzaqnG1lo7Os3az9EcFu5Bqi2ckbaavoqi4XSKqo4ZmyTUzKZ7OfDd4Y5znkbJONrd2Z45G1gABgbgMAAdgHoVRAREQEREBERBUURBVCQASSAACSScAAbySSix/V1NqGuslXQWNkXlVd/DTSTTCERUzgecLSRvLvk+xxPcgwqs5YKeCrq4aWy+U00U0kcFQa4xGdjTsiTY5h2Ae0b+9fn6ZT83R+Jn9ssd6LdceaoPFs/JOi3XHmqDxbPyQZF0yn5uD8TP7ZOmU/NwfiZ/bLHei3XHmaHxbPyTot1x5mh8Wz8kGQScsLJWSRS6aa+ORjo5GOuRIcxw2XNP8N3hapkMbpJHRsLIy9xYwu2ixpOQ0uIGcdizbot1x5mh8Wz8liFxoai2V1bb6kxmoo5n083NO2mbbDg7LsD/SD32S5yWa62y6RxiR1FUNm5suLBI3Ba5hcAcZBI7CtldMv/AJwfiZ/bLVEEEtTNBTxN2pZ5Y4Y25xl8jgxoz7Ss16LdceZofFs/JBkXTKfm4PxM/tlsDS96r9QWyO6VNuFBHO93kkRndM+WFvV50kxswCc7O7sGe/fqm18lWpX3ChF08lit3PNdWPhqGvlMLes5jA0druwHuznuwd4RRRQxRQxMayKFjIomMGGsYxoa1rQO4DsQeaqiIKiiICIiAiIgIiICJu4pkcUBEXoqqqjo6eerq544KaBu3NNM4NjY3s3k/cPb6UHou9zpbNbbhc6o4ho4HSkZwXv+SyNvpcSGj2rluqqJqupqqqZ21NUzSzyu4vkcXuP+VmWvNau1JUMoqEyMs1I8uj2gWvq5uznpGnsA3hg9OTvOGYOgyjQVsddNU2aPY2oqSX4RqDvw2Om64Jxxdsj610esC5NNMvstrfcayMsuN1ax+w8YfT0g60cZB3gu+U76h2tWfICIiAiIgIiICIiCooiAvj6nuVVZ7DeLnStidUUkAkiEzS6PaL2s6wBB7+K+wvi6qoKm6advtBTAGoqKOTmW9pfJGRKGD0uxge1BqLpZ1j5i0eGm96nS1rLzFo8NN75a/IIJBBG87j2hG7O03aJDcja2cE478AoM9fyr6ze0hrLVGT/MyleXD2bchH+Fi131DqC+yNkulfPU7B2o43ENgjd2ZZDGBGD6dnK2PS8k1rrKalq6fUM0lPUwxzwvbRR4dHI0Paf+Vftg5H7I14NTdrhK0drYY4ICftOD/wDSDTDGSSPZGxrnSPc1jGMBc5znHAa0Dfk9y23obk5likp7zqGDZdGWy0dukHWDhvbLVD0dob9/ZsnPrLpPTFgw63W+JlRjDqmYmapORg4kkyRnvDcD0L7oAQAqoiCooiAqoiCooiAiIgIiIHFN/cnFEHPfKNYRZtQVE8EezRXXbrafAw1kpPx0Y7tzt4HBw4LC10Vr+wC+6fqxEzarrftV1HjG04sb8ZEO/rNzj0gcFzqUG7eSi/eV22qsk781Fsdz1LtEkuo5Xb2jP9Dv8PA7lstcw6YvUlgvVtuQ2jFFLsVTG/z00nUkGPZvHpAXTcckcrI5YnNfHIxskb2kFr2OAcHNI7ig80REBERAREQEREBERAREQVFEQXiinFEBc468sHwDqCsiiYW0Nbmuodx2WxyuO3EPoOyO3sxxXRywjlKsJu9glq4WZrLRt1kWBlz6fHx7Pu632PSg5+W+OS6+/CVjNtmfmqs7mwtByXOpJMuiP2cFv1DitDrI9F306fv9BWPfs0sx8jr+Hk0xALj9EhrvsoOlQVV4gggEYwd4I3gjiCqgqKIgqKIgKqIgqKIgIiICIiBxROKICjgHAhwBaQQQRkEHtBBVRBzRrGxO0/f7hQtaRSvcKqhJzvppiS0DP9Jy0/RWPLe3KjYRcbKy6QMzVWcmR5aMufRyYEg3f0nDvYDxWiUHQnJxfjedP08Mz9qttRbQz5OXPia3MMhzxb1Se8tPFZouduT6/wDwHqClEz9mhuOzQ1efktLz8VKe7quxk8CV0SgImEQEREBERAREQEREFRREF4opxRAVURB4SxRTxywzMbJFKx8UrHjLXxvBa5rhwIXOV80ZqO33a5UdHaLrVUkM7vJaimo6ieOSB3XZ142FuQCA70grpBEHLw0zq4f9evn1W2s92ugtI11zrrDb33Skq6W4U7fJKplbDLBJI+EBolDZWtJDhg5x25HcvvogqKIgqKIgKqIgqKIgIiICIiBxREQEREBERAREQEREBERAREQEREBERB//2Q==",
   
    //"order_id": "order_9A33XWu170gUtm", //This is a sample Order ID. Pass the `id` obtained in the response of Step 1
    "callback_url": "https://eneqd3r9zrjok.x.pipedream.net/",
    "handler": function (response){ 
    jQuery.ajax({
        type:"POST",
        url:"payment.php",
        data:"pay_id="+response.razorpay_payment_id+"&amount="+amount+"&name"+name,
        success:function(result){
            window.location.href="success.php";
        }
        
    });
    }
,
    "prefill": {
        "name": "",
        "email": "",
        "contact": ""
    },
    "notes": {
        "address": "Razorpay Corporate Office"
    },
    "theme": {
        "color": "#3399cc"
    }
};
var rzp1 = new Razorpay(options);
{
    rzp1.open();
  
}

    
</script>