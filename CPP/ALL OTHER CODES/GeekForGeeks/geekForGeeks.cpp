#include<iostream>
using namespace std;
class Base_virtual  
 {  
 public:  
    virtual void function1_virtual() {cout<<"Base :: function1_virtual()\n";};  
    virtual void function2_virtual() {cout<<"Base :: function2_virtual()\n";};  
    virtual ~Base_virtual(){};
};  
    
class Derived1_virtual: public Base_virtual  
{  
    public:  
    ~Derived1_virtual(){};
     virtual void function1_virtual() { cout<<"Derived1_virtual :: function1_virtual()\n";} 
     virtual void function2_virtual() {cout<<"Derived1_virtual :: function2_virtual()\n";}

}; 
   
 int main() 
 { 
    Derived1_virtual *d = new Derived1_virtual(); 
    Base_virtual *b = d;
    // Derived1_virtual d; 
    // Base_virtual *b = &d;
    b->function1_virtual();
    b->function2_virtual();
    delete (b);
    return (0);
}