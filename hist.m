close all
clear all
clc

img=imread('vizesoru2.tif');
subplot(321)
imshow(img)
title('orjinal goruntu')
subplot(322)
imhist(img)



if(size(img,3)>1)
    img=rgb2gray(img);
end

max_r=size(img,1);
max_c=size(img,2);

histogram=zeros([1 256]);
cumulative_hist=zeros([0 256]);

for r=1:max_r
    for c=1:max_c
        for count=1:256
            if(img(r,c)==count-1)
                histogram(count)=histogram(count)+1;
                break;
            end
        end
    end
end


%kümalative histogramý bulma
current_value=0;
for count=1:256
    current_value=current_value+histogram(count);
    cumulative_hist(count)=current_value;
end
normalized_hist=zeros([1 256]);
cdf_min=min(cumulative_hist);
%histogram eþitleme


for count=1:256
    normalized_hist(count)=cumulative_hist(count)-cdf_min;
    normalized_hist(count)=normalized_hist(count)/((max_r*max_c)-cdf_min);
    normalized_hist(count)=round(normalized_hist(count)*255);  %en yakýn tam sayýya yuvarlama
end

%max_r ve max_c boyutunda sýfýrdan matrýs olusturma


equalized_img=zeros([max_c max_r]);
for r=1:max_r
    for c=1:max_c
        for count=1:256
            if(img(r,c)==count-1)
                equalized_img(r,c)=normalized_hist(count);
                break;
            end
        end
    end
end

subplot(323)
imshow(uint8(equalized_img));
title('histogramý eþitlenmiþ göruntu')
H=uint8(equalized_img);
subplot(324)
imhist(H)




Qmax=255;
Qmin=0;
Imax=max(max(img));
Imin=min(min(img));
% Q=((Qmax-Qmin)*(I-Imin))/(Imax-Imin)+Qmin;
Q=((Qmax-Qmin)/(Imax-Imin))*(img-Imin)+Qmin;
subplot(325)
imshow(Q)
title('konstrasý gerilmiþ')
subplot(326)
imhist(Q)