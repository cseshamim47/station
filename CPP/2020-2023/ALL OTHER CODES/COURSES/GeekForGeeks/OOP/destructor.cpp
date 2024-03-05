#include <bits/stdc++.h>
using namespace std;
class Test{
    int a;
    public:
        Test(int x):a(x) { 
            printf("constructor : %d\n", a); 
        }
        ~Test(){ printf("destructor : %d\n", a); }

};
int main()
{
    // {
    //     Test one(10);
    // }
    
    Test one(10);
    Test two(20);  
    
}