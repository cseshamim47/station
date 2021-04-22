#include <bits/stdc++.h>
using namespace std;

class BaseClass{
    public:
    int x;
};
class DerivedClass : public BaseClass{};

struct BaseStruct{
    int x;
};
struct DerivedStruct : BaseStruct{};

int main()
{
    {
        DerivedStruct d;
        d.x = 20;
        cout << d.x;
    }

    {
        DerivedClass d;
        d.x = 20;
        cout << endl << d.x;
    }   

    
}