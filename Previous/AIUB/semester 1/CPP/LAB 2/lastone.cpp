#include<iostream>
using namespace std;
int main()
{
int x,p,q,a,b,c;
x=2;
p=x++;
q=++x;

a=p+q;
b=q+q;
c=q+q+q;

cout<< "a.y="<<a<<endl;

cout<< "b.y="<<b<<endl;

cout<< "c.y="<<c<<endl;

}
