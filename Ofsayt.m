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

while j<100 
    
    
    if green==en(1)
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
