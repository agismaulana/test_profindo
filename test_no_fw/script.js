document.addEventListener('DOMContentLoaded', function() {
	let nilai = document.getElementById('nilai')
	let btnCheck = document.getElementById('btn-check')

	deretMatika()
	btnCheck.addEventListener('click', function() {
		grade(nilai.value)
	})

	pascal()
})

function deretMatika() {
	let html = '';
	for(let i = 1; i <= 100; i++) {
		if((i % 2) != 0) {
			html += `| ${i} | `
		}
	}

	document.getElementById('deret').innerHTML = html
}

function grade(nilai) {
	let grade = document.getElementById('grade')
	let finishGrade = ''
	
	if(nilai >= 80) {
		finishGrade = 'A'
	} else if(nilai >= 60) {
		finishGrade = 'B'
	} else if(nilai >= 40) {
		finishGrade = 'C'
	} else {
		finishGrade = 'D'
	}

	grade.innerHTML = 'Grade Yang Anda dapat : ' + finishGrade
}

function pascal() {
	let pascal = ''
	for (let i=1;i<=5;i++){
        for (let j=i;j<=5;j++){
        	pascal += '&nbsp; '
        }
        for (let k=1;k<=i;k++){
        	pascal += '*'
        }
        pascal += '<br/>'
    }
	document.getElementById('pascal').innerHTML = pascal
}