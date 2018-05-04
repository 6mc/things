p=imread('C:/matlab/offside.jpg');
crop=imcrop(p,[0 100 924 404]);
red=0;
green=0;
i=0;
j=0;
toplam=0;
vale=0;
en=size(crop);
while i<100 
    
    
    if red==en(1)
       toplam=toplam+red;
        red=0;
        vale=vale+1;
          
    end
  
    red=red+1;
    
    i=crop(red,en(2)-vale,1);
    j=crop(red,en(2)-vale,2);
    if i>100 && j>100
       
        i=40;
    end
    
    
    
     
   
end
disp(toplam);
toplam=0;
j=0;
vale=0;
red=1;
k=0;
total=0;
blue=0;
dale=0;
while k<100 
    
    
    
    if blue==en(1)
       total=total+blue;
        blue=0;
        dale=dale+1;
          
    end
  
    blue=blue+1;
    
    i=crop(blue,en(2)-dale,1);
    j=crop(blue,en(2)-dale,2);
      k=crop(blue,en(2)-dale,3);
    if i>100 && j>100 
       
        k=40;
    end
    
    
    
     
   
end

 
disp(total);

