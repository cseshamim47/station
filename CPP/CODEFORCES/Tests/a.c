#include <stdio.h>

int main(){
    int salary=12000;
    double tax = 0;
    double x,y,z = 12;

    scanf("%lf %lf",&x,&y);
    
    tax += 2000 * (x/100);
    tax += 6000 * (y/100);
    tax += (salary-2000-6000) * (12/100.00);
    
    printf("%lf",tax);
}