function sendReq(quiz_1m, quiz_2m, lab_1m, lab_2m, quiz_1f, quiz_2f, lab_1f, lab_2f, examM, attM, examF, attF) {
    $.ajax({
        method: 'POST',
        url: 'server.php',
        data: {
            // mid vars
            quiz_1m: quiz_1m || null,
            quiz_2m: quiz_2m || null,
            lab_1m: lab_1m || null,
            lab_2m: lab_2m || null,
            examM: examM || null,
            attM: attM || null,

            // final vars
            quiz_1f: quiz_1f || null,
            quiz_2f: quiz_2f || null,
            lab_1f: lab_1f || null,
            lab_2f: lab_2f || null,
            examF: examF || null,
            attF: attF || null
        },
        success: (data) => {
            // data response
            console.log(data);
            if (data == "Error: One or more input fields are empty" || data == "Error: Input the range of the grades from 50-100 only") {
                swal({
                    title: 'Error!',
                    content: {
                        element: 'div',
                        attributes: {
                            style: 'border: black 2px solid; padding: 20px; font-size: large;',
                            innerHTML: data
                        }
                    },
                    icon: 'error'
                })
            }
            else {
                swal({
                    title: 'Here is the result!',
                    content: {
                        element: 'div',
                        attributes: {
                            style: 'border: black 2px solid; padding: 20px; font-size: large;',
                            innerHTML: data
                        }
                    },
                    icon: 'success'
                })
            }
        }
    });
}