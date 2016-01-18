<?php

    // configuration
    require("../includes/config.php"); 

?>

<html>
  <head>
    <script>
    </script>
    
    <canvas id="scoreboard" width="600" height="40"
    style="border:1px solid #000000;">

      <script>
        var d=document.getElementById("scoreboard");
        var dtx=d.getContext("2d");
        var score = 0;
        var perf = 0;
        var good = 0; 
        var miss = 0;

        function whichKey(event)
        {
          // 37 - left, 38 - up, 39 - right, 40 - down
          if (event.keyCode == 37)
          {
              // loop: check if any values in arrows with type 1 has reached height = 10
              if (checkArrow(1) == 0)
              {
                score += 500;
                perf++;
              }
              else if (checkArrow(1) == 1)
              {
                score += 200;
                good++;
              }
              else
              {
                score -= 100;
              }
              updateScore();
              writeStats();
              writeScore();
          }
          if (event.keyCode == 40)
          {
              // loop: check if any values in arrows with type 2 has reached height = 10
              if (checkArrow(2) == 0)
              {
                score += 500;
                perf++;
              }
              else if (checkArrow(2) == 1)
              {
                score += 200;
                good++;
              }
              else
              {
                score -= 100;
              }
              updateScore();
              writeStats();
              writeScore();
          }
          if (event.keyCode == 38)
          {
              // loop: check if any values in arrows with type 3 has reached height = 10
              if (checkArrow(3) == 0)
              {
                score += 500;
                perf++;
              }
              else if (checkArrow(3) == 1)
              {
                score += 200;
                good++;
              }
              else
              {
                score -= 100;
              }
              updateScore();
              writeStats();
              writeScore();
          }
          if (event.keyCode == 39)
          {
              // loop: check if any values in arrows with type 4 has reached height = 10
              if (checkArrow(4) == 0)
              {
                score += 500;
                perf++;
              }
              else if (checkArrow(4) == 1)
              {
                score += 200;
                good++;
              }
              else
              {
                score -= 100;
              }
              updateScore();
              writeStats();
              writeScore();
          }
          
        }

        function writeScore()
        {
          dtx.fillStyle="#000000";
          dtx.fillRect(0,0,600,50);
          dtx.font="30px Verdana";
          dtx.fillStyle="#FFFFFF";
          dtx.fillText("Score: ".concat(score), 220, 35);
          writeStats();
        }

       // catch arrows that weren't pressed
       function updateScore()
       {
        for (x in arrows)
         {
           if (arrows[x].height < -31 && arrows[x].press == 0)
           {
             arrows[x].press = 1;
             miss++;
             score -= 100;
             alert("!!");
           }
           if (arrows[x].height > 31)
           {
             arrows[x].press = 0;
           }
         }
         writeScore();
       }

        writeScore();


      </script>
    </canvas>
    
    
    <br>
    
  </head>


  <body onkeyup="whichKey(event)">
  
    <canvas id="game" width="600" height="500"
    style="border:1px solid #000000;">
    
      <script>

        var arrows = new Array();
      
        var c=document.getElementById("game");
        var ctx=c.getContext("2d");
        ctx.fillStyle="#000000";
        ctx.fillRect(100,0,400,500);

      // Create gradients
        var grd=ctx.createLinearGradient(500,0,600,0);
        grd.addColorStop(0,"#99CCFF");
        grd.addColorStop(0.4,"#FFFFFF");
        grd.addColorStop(0.6,"#FFFFFF");
        grd.addColorStop(1,"#99CCFF");

        var grd2=ctx.createLinearGradient(0,0,100,0);
        grd2.addColorStop(0,"#99CCFF");
        grd2.addColorStop(0.4,"#FFFFFF");
        grd2.addColorStop(0.6,"#FFFFFF");
        grd2.addColorStop(1,"#99CCFF");

        ctx.fillStyle=grd;
        ctx.fillRect(500,0,100,500);
        ctx.fillStyle=grd2;
        ctx.fillRect(0,0,100,500);

      // draw arrows

      // left
      function drawLeftArrow(color, startx, starty)
      {
        var c=document.getElementById("game");
        var ctx=c.getContext("2d");
        starty = starty + 10;
        ctx.beginPath();
        ctx.moveTo(startx+40,starty+0);
        ctx.lineTo(startx+40,starty+30);
        ctx.lineTo(startx+80,starty+30);
        ctx.lineTo(startx+80,starty+50);
        ctx.lineTo(startx+40,starty+50);
        ctx.lineTo(startx+40,starty+80);
        ctx.lineTo(startx+0,starty+40);
        ctx.lineTo(startx+40,starty+0);
        ctx.strokeStyle=color;
        ctx.lineWidth=4;
        ctx.stroke();
      }

      // down
      function drawDownArrow(color, startx, starty)
      {
        var c=document.getElementById("game");
        var ctx=c.getContext("2d");
        starty = starty + 10;
        ctx.beginPath();
        ctx.moveTo(startx+0,starty+40);
        ctx.lineTo(startx+30,starty+40);
        ctx.lineTo(startx+30,starty+0);
        ctx.lineTo(startx+50,starty+0);
        ctx.lineTo(startx+50,starty+40);
        ctx.lineTo(startx+80,starty+40);
        ctx.lineTo(startx+40,starty+80);
        ctx.lineTo(startx+0,starty+40);
        ctx.strokeStyle=color;
        ctx.lineWidth=4;
        ctx.stroke();
      }

      // up
      function drawUpArrow(color, startx, starty)
      {
        var c=document.getElementById("game");
        var ctx=c.getContext("2d");
        starty = starty + 10;
        ctx.beginPath();
        ctx.moveTo(startx+0,starty+40);
        ctx.lineTo(startx+30,starty+40);
        ctx.lineTo(startx+30,starty+80);
        ctx.lineTo(startx+50,starty+80);
        ctx.lineTo(startx+50,starty+40);
        ctx.lineTo(startx+80,starty+40);
        ctx.lineTo(startx+40,starty+0);
        ctx.lineTo(startx+0,starty+40);
        ctx.strokeStyle=color;
        ctx.lineWidth=4;
        ctx.stroke();
      }

      // right
      function drawRightArrow(color, startx, starty)
      {
        var c=document.getElementById("game");
        var ctx=c.getContext("2d");
        starty = starty + 10;
        ctx.beginPath();
        ctx.moveTo(startx+40,starty+80);
        ctx.lineTo(startx+40,starty+50);
        ctx.lineTo(startx+0,starty+50);
        ctx.lineTo(startx+0,starty+30);
        ctx.lineTo(startx+40,starty+30);
        ctx.lineTo(startx+40,starty+0);
        ctx.lineTo(startx+80,starty+40);
        ctx.lineTo(startx+40,starty+80);
        ctx.strokeStyle=color;
        ctx.lineWidth=4;
        ctx.stroke();
      }
      
      // erase arrow
      // use 100, 200, 300, and 400 to erase each arrow category
      // (for animation, going to have to redraw top arrows along with the moving arrows
      function eraseArrow(startx, starty)
      {
        ctx.fillStyle="#000000";
        ctx.fillRect(startx,starty+25,100,100);        
      }

      // draw the top arrows that aren't the moving ones
      function drawArrows()
      {
        drawLeftArrow("cyan",110,0);
        drawDownArrow("lime",210,0);
        drawUpArrow("yellow",310,0);
        drawRightArrow("red",410,0);
      }

      function LeftArrow(height)
      {
          this.type = 1;
          this.height = height;
          this.press = 0;
      }      

      function DownArrow(height)
      {
          this.type = 2;
          this.height = height;
          this.press = 0;
      }      

      function UpArrow(height)
      {
          this.type = 3;
          this.height = height;
          this.press = 0;
      }      

      function RightArrow(height)
      {
          this.type = 4;
          this.height = height;
          this.press = 0;
      }      
      
      
    // move all arrows stored in array up by change pixels
      function moveArrows(change)
      {
          ctx.fillStyle = "black";
          ctx.fillRect(100,0,400,500);
          drawArrows();

          for (x in arrows)
          {
              if (arrows[x].type == 1)
                drawLeftArrow("white", 110, arrows[x].height);
              if (arrows[x].type == 2)
                drawDownArrow("white", 210, arrows[x].height);
              if (arrows[x].type == 3)
                drawUpArrow("white", 310, arrows[x].height);
              if (arrows[x].type == 4)
                drawRightArrow("white", 410, arrows[x].height);
              arrows[x].height = arrows[x].height - change;
          }
      }      

      function checkArrow(type)
      {
        for (x in arrows)
        {
          if (arrows[x].type == type && arrows[x].press == 0)
          {
            if (arrows[x].height < 11 && arrows[x].height > -11)
            {
              arrows[x].press = 1;
              return 0;
            }
            if (arrows[x].height < 31 && arrows[x].height > -31)
            {
              arrows[x].press = 1;
              return 1;
            }
          }            
        }
        return 2;
      }

      function writeStats()
      {
          ctx.fillStyle=grd2;
          ctx.fillRect(0,0,100,500);
          ctx.font="20px Verdana";
          ctx.fillStyle="#000000";
          ctx.fillText("Perfect: ", 10, 50);
          ctx.fillText("Good: ", 10, 150);
          ctx.fillText("Miss: ", 10, 250);
          ctx.fillStyle="#00FF00";
          ctx.fillText(perf, 40, 80);
          ctx.fillStyle="#0000FF";
          ctx.fillText(good, 40, 180);
          ctx.fillStyle="#FF0000";
          ctx.fillText(miss, 40, 280);      
      }

      function beginGame()
      {

      // time to begin!

        score = 0;
        perf = 0;
        good = 0; 
        miss = 0;
        updateScore();
        writeScore();
        writeStats();

        var m=document.getElementById("music");                 
        m.play();

        ctx.font="30px Arial";
        ctx.strokeStyle="white";
        ctx.lineWidth = 4;
        ctx.strokeText("Ready? Let's go!",160,200);
        ctx.font="60px Arial";
        ctx.fillStyle="white";
        ctx.fillText("Begin!",200,250);
        ctx.fillStyle="black";
        start = 3000;
        pause = 100; // refresh arrows at rate of ten times a second
        change = 10; // move arrows at 10px per refresh/100 px per second
        end = 250000; // end of song, 4:10

        time = setTimeout(function(){ctx.fillRect(100,100,400,500)}, start);
        clearTimeout(time);

        time2 = setTimeout(function(){endGame()}, end);

        arrows[0] = new RightArrow(510 + change*20); // reaches top at 0:07
        arrows[1] = new LeftArrow(510 + change*40);
        arrows[2] = new RightArrow(510 + change*60);
        arrows[3] = new LeftArrow(510 + change*80);
        arrows[4] = new UpArrow(510 + change*100);
        arrows[5] = new DownArrow(510 + change*120);
        arrows[6] = new UpArrow(510 + change*140);
        arrows[7] = new LeftArrow(510 + change*160);
        arrows[8] = new RightArrow(510 + change*180);
        arrows[9] = new UpArrow(510 + change*200);
        arrows[10] = new RightArrow(510 + change*220);
        arrows[11] = new DownArrow(510 + change*240);
        arrows[12] = new UpArrow(510 + change*245)
        arrows[13] = new LeftArrow(510 + change*250);
        arrows[14] = new UpArrow(510 + change*255);
        arrows[15] = new RightArrow(510 + change*260);
        arrows[16] = new DownArrow(510 + change*265);
        arrows[17] = new LeftArrow(510 + change*270);
        arrows[18] = new DownArrow(510 + change*275);
        arrows[19] = new RightArrow(510 + change*280);
        arrows[20] = new UpArrow(510 + change*285);
        arrows[21] = new LeftArrow(510 + change*290);
        arrows[22] = new UpArrow(510 + change*295);
        arrows[23] = new RightArrow(510 + change*300);
        arrows[24] = new DownArrow(510 + change*305);
        arrows[25] = new LeftArrow(510 + change*310);
        arrows[26] = new DownArrow(510 + change*315);
        arrows[27] = new RightArrow(510 + change*320);
        arrows[28] = new UpArrow(510 + change*325);
        arrows[29] = new LeftArrow(510 + change*330);
        arrows[30] = new UpArrow(510 + change*335);
        arrows[31] = new RightArrow(510 + change*340);
        arrows[32] = new DownArrow(510 + change*345);
        arrows[33] = new LeftArrow(510 + change*350);
        arrows[34] = new DownArrow(510 + change*355);
        arrows[35] = new RightArrow(510 + change*360);
        arrows[36] = new UpArrow(510 + change*365);
        arrows[37] = new LeftArrow(510 + change*370);
        arrows[38] = new UpArrow(510 + change*375);
        arrows[39] = new RightArrow(510 + change*380);
        arrows[40] = new DownArrow(510 + change*385);
        arrows[41] = new LeftArrow(510 + change*390);
        arrows[42] = new DownArrow(510 + change*395);
        arrows[43] = new RightArrow(510 + change*400);
        arrows[44] = new UpArrow(510 + change*415);
        arrows[45] = new LeftArrow(510 + change*430);
        arrows[46] = new UpArrow(510 + change*445);
        arrows[47] = new RightArrow(510 + change*460);
        arrows[48] = new DownArrow(510 + change*475);
        arrows[49] = new LeftArrow(510 + change*490);
        arrows[50] = new DownArrow(510 + change*505);
        arrows[51] = new RightArrow(510 + change*520);
        arrows[52] = new UpArrow(510 + change*535);
        arrows[53] = new LeftArrow(510 + change*550);
        arrows[54] = new UpArrow(510 + change*565);
        arrows[55] = new RightArrow(510 + change*580);
        arrows[56] = new DownArrow(510 + change*595);
        arrows[57] = new RightArrow(510 + change*610);
        arrows[58] = new UpArrow(510 + change*625);
        arrows[59] = new LeftArrow(510 + change*640);
        arrows[60] = new LeftArrow(510 + change*650);
        arrows[61] = new RightArrow(510 + change*660);
        arrows[62] = new LeftArrow(510 + change*670);
        arrows[63] = new UpArrow(510 + change*680);
        arrows[64] = new RightArrow(510 + change*690);
        arrows[65] = new DownArrow(510 + change*700);
        arrows[66] = new RightArrow(510 + change*710);
        arrows[67] = new UpArrow(510 + change*720);
        arrows[68] = new DownArrow(510 + change*730);
        arrows[69] = new UpArrow(510 + change*740);
        arrows[70] = new LeftArrow(510 + change*750);
        arrows[71] = new RightArrow(510 + change*760);
        arrows[72] = new UpArrow(510 + change*770);
        arrows[73] = new RightArrow(510 + change*780);
        arrows[74] = new LeftArrow(510 + change*790);
        arrows[75] = new DownArrow(510 + change*800);
        arrows[76] = new LeftArrow(510 + change*805);
        arrows[77] = new UpArrow(510 + change*810);
        arrows[78] = new LeftArrow(510 + change*815);
        arrows[79] = new RightArrow(510 + change*820);
        arrows[80] = new DownArrow(510 + change*845);
        arrows[81] = new RightArrow(510 + change*850);
        arrows[82] = new DownArrow(510 + change*855);
        arrows[83] = new UpArrow(510 + change*860);
        arrows[84] = new RightArrow(510 + change*885);
        arrows[85] = new UpArrow(510 + change*890);
        arrows[86] = new RightArrow(510 + change*895);
        arrows[87] = new LeftArrow(510 + change*900);
        arrows[88] = new UpArrow(510 + change*925);
        arrows[89] = new DownArrow(510 + change*930);
        arrows[90] = new UpArrow(510 + change*935);
        arrows[91] = new LeftArrow(510 + change*940);
        arrows[92] = new RightArrow(510 + change*960);
        arrows[93] = new UpArrow(510 + change*970);
        arrows[94] = new DownArrow(510 + change*980);
        arrows[95] = new LeftArrow(510 + change*990);
        arrows[96] = new UpArrow(510 + change*1000);
        arrows[97] = new RightArrow(510 + change*1010);
        arrows[98] = new LeftArrow(510 + change*1020);
        arrows[99] = new DownArrow(510 + change*1030);
        arrows[100] = new LeftArrow(510 + change*1040);
        arrows[101] = new RightArrow(510 + change*1050);
        arrows[102] = new UpArrow(510 + change*1060);
        arrows[103] = new DownArrow(510 + change*1070);
        arrows[104] = new RightArrow(510 + change*1090);
        arrows[105] = new LeftArrow(510 + change*1090);
        arrows[106] = new RightArrow(510 + change*1110);
        arrows[107] = new UpArrow(510 + change*1120);
        arrows[108] = new DownArrow(510 + change*1130);
        arrows[109] = new UpArrow(510 + change*1140);
        arrows[110] = new RightArrow(510 + change*1150);
        arrows[111] = new LeftArrow(510 + change*1180);
        arrows[112] = new DownArrow(510 + change*1170);
        arrows[113] = new RightArrow(510 + change*1180);
        arrows[114] = new LeftArrow(510 + change*1190);
        arrows[115] = new UpArrow(510 + change*1200);
        arrows[116] = new DownArrow(510 + change*1210);
        arrows[117] = new UpArrow(510 + change*1220);
        arrows[118] = new LeftArrow(510 + change*1230);
        arrows[119] = new DownArrow(510 + change*1240);
        arrows[120] = new UpArrow(510 + change*1250);
        arrows[121] = new RightArrow(510 + change*1260);
        arrows[122] = new LeftArrow(510 + change*1310);
        arrows[123] = new RightArrow(510 + change*1320);
        arrows[124] = new LeftArrow(510 + change*1330);
        arrows[125] = new UpArrow(510 + change*1340);
        arrows[126] = new RightArrow(510 + change*1350);
        arrows[127] = new UpArrow(510 + change*1360);
        arrows[128] = new DownArrow(510 + change*1370);
        arrows[129] = new LeftArrow(510 + change*1380);
        arrows[130] = new DownArrow(510 + change*1390);
        arrows[131] = new RightArrow(510 + change*1400);
        arrows[132] = new LeftArrow(510 + change*1410);
        arrows[133] = new UpArrow(510 + change*1420);
        arrows[134] = new LeftArrow(510 + change*1430);
        arrows[135] = new DownArrow(510 + change*1440);
        arrows[136] = new UpArrow(510 + change*1450);
        arrows[137] = new RightArrow(510 + change*1460);
        arrows[138] = new UpArrow(510 + change*1470);
        arrows[139] = new LeftArrow(510 + change*1480);
        arrows[140] = new RightArrow(510 + change*1490);
        arrows[141] = new DownArrow(510 + change*1500);
        arrows[142] = new RightArrow(510 + change*1510);
        arrows[143] = new UpArrow(510 + change*1520);
        arrows[144] = new LeftArrow(510 + change*1550);
        arrows[145] = new RightArrow(510 + change*1580);
        arrows[146] = new LeftArrow(510 + change*1605);
        arrows[147] = new LeftArrow(510 + change*1610);
        arrows[148] = new RightArrow(510 + change*1625);
        arrows[149] = new RightArrow(510 + change*1630);
        arrows[150] = new LeftArrow(510 + change*1645);
        arrows[151] = new LeftArrow(510 + change*1650);
        arrows[152] = new RightArrow(510 + change*1665);
        arrows[153] = new RightArrow(510 + change*1670);
        arrows[154] = new LeftArrow(510 + change*1685);
        arrows[155] = new LeftArrow(510 + change*1690);
        arrows[156] = new RightArrow(510 + change*1705);
        arrows[157] = new RightArrow(510 + change*1710);
        arrows[158] = new LeftArrow(510 + change*1725);
        arrows[159] = new LeftArrow(510 + change*1730);
        arrows[160] = new RightArrow(510 + change*1745);
        arrows[161] = new RightArrow(510 + change*1750);
        arrows[162] = new LeftArrow(510 + change*1765);
        arrows[163] = new LeftArrow(510 + change*1770);
        arrows[164] = new UpArrow(510 + change*1780);
        arrows[165] = new UpArrow(510 + change*1782.5);
        arrows[166] = new RightArrow(510 + change*1785);
        arrows[167] = new RightArrow(510 + change*1787.5);
        arrows[168] = new UpArrow(510 + change*1790);
        arrows[169] = new UpArrow(510 + change*1792.5);
        arrows[170] = new LeftArrow(510 + change*1795);
        arrows[171] = new LeftArrow(510 + change*1797.5);
        arrows[172] = new DownArrow(510 + change*1800);
        arrows[173] = new DownArrow(510 + change*1802.5);
        arrows[174] = new RightArrow(510 + change*1805);
        arrows[175] = new RightArrow(510 + change*1807.5);
        arrows[176] = new DownArrow(510 + change*1810);
        arrows[177] = new DownArrow(510 + change*1812.5);
        arrows[178] = new LeftArrow(510 + change*1815);
        arrows[179] = new LeftArrow(510 + change*1817.5);
        arrows[180] = new UpArrow(510 + change*1820);
        arrows[181] = new UpArrow(510 + change*1822.5);
        arrows[182] = new RightArrow(510 + change*1825);
        arrows[183] = new RightArrow(510 + change*1827.5);
        arrows[184] = new LeftArrow(510 + change*1830);
        arrows[185] = new LeftArrow(510 + change*1832.5);
        arrows[186] = new UpArrow(510 + change*1835);
        arrows[187] = new UpArrow(510 + change*1837.5);
        arrows[188] = new LeftArrow(510 + change*1840); 
        arrows[189] = new LeftArrow(510 + change*1842.5);
        arrows[190] = new DownArrow(510 + change*1845);
        arrows[191] = new DownArrow(510 + change*1847.5);
        arrows[192] = new UpArrow(510 + change*1850);
        arrows[193] = new UpArrow(510 + change*1852.5);
        arrows[194] = new RightArrow(510 + change*1855);
        arrows[195] = new RightArrow(510 + change*1857.5);
        arrows[196] = new DownArrow(510 + change*1860);
        arrows[197] = new DownArrow(510 + change*1862.5);
        arrows[198] = new RightArrow(510 + change*1865);
        arrows[199] = new RightArrow(510 + change*1867.5);
        arrows[200] = new LeftArrow(510 + change*1870);
        arrows[201] = new LeftArrow(510 + change*1872.5);
        arrows[202] = new UpArrow(510 + change*1875);
        arrows[203] = new UpArrow(510 + change*1877.5);
        arrows[204] = new RightArrow(510 + change*1880);
        arrows[205] = new RightArrow(510 + change*1882.5);
        arrows[206] = new LeftArrow(510 + change*1885);
        arrows[207] = new LeftArrow(510 + change*1887.5);
        arrows[208] = new DownArrow(510 + change*1890);
        arrows[209] = new DownArrow(510 + change*1892.5);
        arrows[210] = new UpArrow(510 + change*1895);
        arrows[211] = new UpArrow(510 + change*1897.5);
        arrows[212] = new LeftArrow(510 + change*1900);
        arrows[213] = new LeftArrow(510 + change*1902.5);
        arrows[214] = new DownArrow(510 + change*1905);
        arrows[215] = new DownArrow(510 + change*1907.5);
        arrows[216] = new RightArrow(510 + change*1910);
        arrows[217] = new UpArrow(510 + change*1912.5);
        arrows[218] = new DownArrow(510 + change*1915);
        arrows[219] = new LeftArrow(510 + change*1917.5);
        arrows[220] = new RightArrow(510 + change*1970);
        arrows[221] = new UpArrow(510 + change*1972.5);
        arrows[222] = new RightArrow(510 + change*1975);
        arrows[223] = new DownArrow(510 + change*1977.5);
        arrows[224] = new LeftArrow(510 + change*1980);
        arrows[225] = new UpArrow(510 + change*1982.5);
        arrows[226] = new LeftArrow(510 + change*1985);
        arrows[227] = new DownArrow(510 + change*1987.5);
        arrows[228] = new RightArrow(510 + change*1990);
        arrows[229] = new DownArrow(510 + change*1992.5);
        arrows[230] = new RightArrow(510 + change*1995);
        arrows[231] = new UpArrow(510 + change*1997.5);
        arrows[232] = new LeftArrow(510 + change*2000);
        arrows[233] = new DownArrow(510 + change*2002.5);
        arrows[234] = new LeftArrow(510 + change*2005);
        arrows[235] = new UpArrow(510 + change*2007.5);
        arrows[236] = new RightArrow(510 + change*2010);
        arrows[237] = new LeftArrow(510 + change*2012.5);
        arrows[238] = new RightArrow(510 + change*2015);
        arrows[239] = new LeftArrow(510 + change*2017.5);
        arrows[240] = new UpArrow(510 + change*2040);
        arrows[241] = new LeftArrow(510 + change*2042.5);
        arrows[242] = new UpArrow(510 + change*2045);
        arrows[243] = new RightArrow(510 + change*2047.5);
        arrows[244] = new DownArrow(510 + change*2050);
        arrows[245] = new LeftArrow(510 + change*2052.5);
        arrows[246] = new DownArrow(510 + change*2055);
        arrows[247] = new RightArrow(510 + change*2057.5);
        arrows[248] = new UpArrow(510 + change*2060);
        arrows[249] = new RightArrow(510 + change*2062.5);
        arrows[250] = new UpArrow(510 + change*2065);
        arrows[251] = new LeftArrow(510 + change*2067.5);
        arrows[252] = new DownArrow(510 + change*2070);
        arrows[253] = new RightArrow(510 + change*2072.5);
        arrows[254] = new DownArrow(510 + change*2075);
        arrows[255] = new LeftArrow(510 + change*2077.5);
        arrows[256] = new UpArrow(510 + change*2080);
        arrows[257] = new DownArrow(510 + change*2082.5);
        arrows[258] = new RightArrow(510 + change*2085);
        arrows[259] = new LeftArrow(510 + change*2087.5);
        arrows[260] = new UpArrow(510 + change*2090);
        arrows[261] = new DownArrow(510 + change*2092.5);
        arrows[262] = new RightArrow(510 + change*2095);
        arrows[263] = new LeftArrow(510 + change*2097.5);
        arrows[264] = new UpArrow(510 + change*2120);
        arrows[265] = new UpArrow(510 + change*2122.5);
        arrows[266] = new LeftArrow(510 + change*2125);
        arrows[267] = new RightArrow(510 + change*2127.5);
        arrows[268] = new DownArrow(510 + change*2130);
        arrows[269] = new DownArrow(510 + change*2132.5);
        arrows[270] = new LeftArrow(510 + change*2135);
        arrows[271] = new RightArrow(510 + change*2137.5);
        arrows[272] = new LeftArrow(510 + change*2140);
        arrows[273] = new LeftArrow(510 + change*2142.5);
        arrows[274] = new UpArrow(510 + change*2145);
        arrows[275] = new DownArrow(510 + change*2147.5);
        arrows[276] = new RightArrow(510 + change*2150);
        arrows[277] = new RightArrow(510 + change*2152.5);
        arrows[278] = new UpArrow(510 + change*2155);
        arrows[279] = new DownArrow(510 + change*2157.5);
        arrows[280] = new UpArrow(510 + change*2160);
        arrows[281] = new UpArrow(510 + change*2162.5);
        arrows[282] = new RightArrow(510 + change*2165);
        arrows[283] = new LeftArrow(510 + change*2167.5);
        arrows[284] = new DownArrow(510 + change*2170);
        arrows[285] = new DownArrow(510 + change*2172.5);
        arrows[286] = new RightArrow(510 + change*2175);
        arrows[287] = new LeftArrow(510 + change*2177.5);
        arrows[288] = new RightArrow(510 + change*2180);
        arrows[289] = new LeftArrow(510 + change*2182.5);
        arrows[290] = new UpArrow(510 + change*2187.5);
        arrows[291] = new DownArrow(510 + change*2187.5);
        arrows[292] = new DownArrow(510 + change*2210);
        arrows[293] = new LeftArrow(510 + change*2212.5);
        arrows[294] = new RightArrow(510 + change*2215);
        arrows[295] = new RightArrow(510 + change*2217.5);
        arrows[296] = new UpArrow(510 + change*2220);
        arrows[297] = new DownArrow(510 + change*2222.5);
        arrows[298] = new LeftArrow(510 + change*2225);
        arrows[299] = new LeftArrow(510 + change*2227.5);
        arrows[300] = new RightArrow(510 + change*2230);
        arrows[301] = new UpArrow(510 + change*2232.5);
        arrows[302] = new DownArrow(510 + change*2235);
        arrows[303] = new DownArrow(510 + change*2237.5);
        arrows[304] = new LeftArrow(510 + change*2240);
        arrows[305] = new RightArrow(510 + change*2242.5);
        arrows[306] = new UpArrow(510 + change*2245);
        arrows[307] = new UpArrow(510 + change*2247.5);
        arrows[308] = new LeftArrow(510 + change*2250);
        arrows[309] = new RightArrow(510 + change*2252.5);
        arrows[310] = new LeftArrow(510 + change*2255);
        arrows[311] = new DownArrow(510 + change*2257.5);
        arrows[312] = new UpArrow(510 + change*2260);
        arrows[313] = new DownArrow(510 + change*2262.5);
        arrows[314] = new UpArrow(510 + change*2265);
        arrows[315] = new LeftArrow(510 + change*2267.5);
        arrows[316] = new RightArrow(510 + change*2270);
        arrows[317] = new LeftArrow(510 + change*2272.5);
        arrows[318] = new RightArrow(510 + change*2275);
        arrows[319] = new UpArrow(510 + change*2277.5);
        arrows[320] = new DownArrow(510 + change*2280);
        arrows[321] = new UpArrow(510 + change*2282.5);
        arrows[322] = new DownArrow(510 + change*2285);
        arrows[323] = new RightArrow(510 + change*2287.5);
        arrows[324] = new LeftArrow(510 + change*2290);
        arrows[325] = new UpArrow(510 + change*2290);
        arrows[326] = new RightArrow(510 + change*2292.5);
        arrows[327] = new DownArrow(510 + change*2292.5);
        arrows[328] = new LeftArrow(510 + change*2295);
        arrows[329] = new RightArrow(510 + change*2295);
        arrows[330] = new UpArrow(510 + change*2297.5);
        arrows[331] = new DownArrow(510 + change*2297.5);
        arrows[332] = new UpArrow(510 + change*2320);
        arrows[333] = new RightArrow(510 + change*2320);
        arrows[334] = new DownArrow(510 + change*2350);
        arrows[335] = new LeftArrow(510 + change*2350);
        arrows[336] = new LeftArrow(510 + change*2400);
        arrows[337] = new RightArrow(510 + change*2400);


        // arrows move at 20 px five times a second, or 100 px a second        
        t = setInterval(function(){moveArrows(change)}, pause);
        t2 = setInterval(function(){updateScore()}, pause);
        t3 = setInterval(function(){writeStats()}, pause);
        
      }
      
      function endGame()
      {
        ctx.fillStyle = "#000000";
        ctx.fillRect(100,100,400,500)
        ctx.font="30px Arial";
        ctx.strokeStyle="white";
        ctx.lineWidth = 4;
        ctx.strokeText("Congratulations!",160,200);
        arrows = [];
        clearTimeout(t);
        clearTimeout(t2);
        clearTimeout(t3);
        
      }

    // main body of code
      drawArrows();

      writeStats();

      </script>    
    </canvas>

    <p>

    <button onclick=beginGame()>Play</button>
    <audio preload="auto" controls="control" id="music" hidden>
      <source src="http://project/img/fuchsiaruler.mp3">      
      Your browser does not support the audio tag.
    </audio>
    
    </p>
  
  </body>
</html>
