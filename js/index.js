/** Created by Murilo. ...*/
//função calcular
function calcular() {
		var tot = 0;
		if(p1.checked == true){tot+=2.5;}
		if(p2.checked == true){tot+=2.0;}
		if(p3.checked == true){tot+=1.7;}
		if(p4.checked == true){tot+=1.5;}
		if(p5.checked == true){tot+=2.7;}
		resp.value ="R$ " + tot.toFixed(2);
}