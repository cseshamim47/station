#include <iostream>
#include <string>
using namespace std;

class shantosClass{
    public:
        void setName(string x) {
            name = x;
        }
        string getName(){
            return name;
        }
    private:
        string name;
};


int main ()
{
    shantosClass so;
    so.setName("This programm is working");
    cout << so.getName();

    return 0;
}
