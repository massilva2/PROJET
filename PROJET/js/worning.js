
  document.querySelector('form').addEventListener('submit', function(event) {
    const telephone1 = document.getElementById('numero1').value;
    const telephone2 = document.getElementById('numero2').value;

    if (!telephone1.match(/^0[5-7][0-9]{8}$/) || !telephone2.match(/^0[5-7][0-9]{8}$/)) {
      event.preventDefault();
      document.querySelector('.error1').style.display = 'block';
    }

    if (telephone1=== telephone2 ) {
      event.preventDefault();
      document.querySelector('.error2').style.display = 'block';
    }
  });




