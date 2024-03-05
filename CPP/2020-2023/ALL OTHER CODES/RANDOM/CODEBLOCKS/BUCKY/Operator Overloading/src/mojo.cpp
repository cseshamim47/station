#include <iostream>
#include "mojo.h"
using namespace std;

mojo::mojo()
{}

mojo::mojo(int x){
    num = x;
}

mojo mojo::operator+(mojo amo){
    mojo brandNew;
    brandNew.num = num + amo.num;
    return(brandNew);
}
