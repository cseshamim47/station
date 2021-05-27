#include <bits/stdc++.h>
using namespace std;

class Test{
    public:
    Test(){printf("Default constructor!!!\n");}
    Test(int x){ printf("Param cons\n"); }
};
class Main{
    private:
        Test t;
    public:
        Main():t(500){
            
        }
};

int main()
{
    // Main m;
    Test t(50);
}