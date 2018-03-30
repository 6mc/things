close all
clear all
clc
figure
Iorj=imread('vizesoru4.jpg')
imshow(Iorj);
f=im2double(Iorj);
figure
subplot(221)
imshow(Iorj);
subplot(222)
f1=fft2(f);%2 boyutta aldýgýmýz ýcýn fft komutuda var

imshow(log(abs(f1)),[]);
subplot(223)
f2=fftshift(f1);

imshow(log(abs(f2)),[]);
subplot(224)
mesh(abs(f2)) ;   

 %gauss ekleme-----------------------------------------------
Iorj=imread('vizesoru4.jpg'); %lenna resmi
I=im2double(Iorj);
[N M]=size(I);
SNR=10;
PS=sum(sum((I.*2)/(N*M)));
sigma=PS./(10.*(0.1*SNR));
W=sqrt(sigma).*randn(N,M);
A=plus(I,W);
% subplot(131)
% imshow(Iorj)
% title('orjinal resim')
% subplot(132)
% imshow(A)
% title('gauss gürültüsü eklenmiþ')


%gausun fourýný alma---------------------------
figure
f=im2double(A);  

subplot(221)
imshow(A);
title('gauss gürültüsü eklenmiþ')
subplot(222)
f1=fft2(f);%2 boyutta aldýgýmýz ýcýn fft komutuda var

imshow(log(abs(f1)),[]);
subplot(223)
f2=fftshift(f1);

imshow(log(abs(f2)),[]);
subplot(224)
mesh(abs(f2)) ;   


%gurultu goruntunun fourýný alma
figure
subplot(221)
imshow(Iorj)
title('orjinal')
f=fftshift(fft2(A));
subplot(223)
imshow(A)
title('gauss gurultusu ekleme')

f=fftshift(fft2(A));
subplot(224)
imshow(log(abs(f)),[])
title('gussun DFT')    %sayfa 80
