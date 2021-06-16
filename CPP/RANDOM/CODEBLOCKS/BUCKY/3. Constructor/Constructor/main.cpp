#include <iostream>
#include <string>

using namespace std;

class shantosClass{
    public:
        shantosClass(string x){
            getName(x);
        }
        void getName(string y){
            name = y;
        }
        string setName(){
            return name;
        }
    private:
        string name;
};

int main ()
{
    shantosClass so("wow I have done it \n");
    cout << so.setName();

    shantosClass so2("another time \n");
    cout << so2.setName();

    shantosClass so3("as many time");
    cout << so3.setName();

    return 0;
}
