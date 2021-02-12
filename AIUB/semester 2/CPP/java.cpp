#include <iostream>
using namespace std;

class person{
    private:
        int id;
        string name;
    public:
        person(){
			cout << "Empty" << endl;
		}
        person(int i, string n){
            id = i;
            name = n;
        }
        void print(){
            cout << "Name : " << name << endl;
            cout << "Id : " << id << endl;
        }

};

int main()
{
    person obj(20, "shamim");
	
    obj.print();
	person obj1;
}