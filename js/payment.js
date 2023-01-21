$(document).on("click", "#online_payment", function (e) {
    e.preventDefault();
    pay();
});

function bill(student, amount, status, transaction_id) {
    $.ajax({
        url: "includes/payment.php",
        method: "post",
        data: {
            bill: "bill",
            student: student,
            amount: amount,
            status: status,
            transaction_id: transaction_id
        },
        success: function (response) {
            if(response='success') 
            {
                location.href = "student-profile.php";
            }
        }
    });
}

function pay() {
    $.ajax({
        url: "includes/payment.php",
        method: "post",
        data: {
            payment: "payment"
        },
        success: function (response) {
            var obj = jQuery.parseJSON(response);
            var options = {
                "key": "rzp_test_NcbZkxdlUuP2zo", // Enter the Key ID generated from the Dashboard
                "amount": obj.total_fees * 100, // Amount is in currency subunits. Default currency is INR. Hence, 50000 refers to 50000 paise
                "currency": "INR",
                "name": "NHITM",
                "description": "Fee Payment",
                "id": "order_9A33XWu170gUtm", //This is a sample Order ID. Pass the `id` obtained in the response of Step 1
                "handler": function (response) {
                    console.log(response);
                    bill(obj.student_id, obj.total_fees, "Success", response.razorpay_payment_id);
                },
                "prefill": {
                    "name": obj.student_name,
                    "email": obj.student_email,
                    "contact": obj.student_phone
                },
                "theme": {
                    "color": "#3399cc"
                }
            };
            var rzp1 = new Razorpay(options);
            rzp1.on('payment.failed', function (response) {
                alert(response.error.code);
                alert(response.error.description);
                alert(response.error.source);
                alert(response.error.step);
                alert(response.error.reason);
                alert(response.error.metadata.order_id);
                alert(response.error.metadata.payment_id);
            });
            rzp1.open();
        }
    });
}
