#include <bits/stdc++.h>
using namespace std;

struct Student{
    int roll;
    int age;
    string name;
    string address;
};

void print(const Student &s){
    cout << s.roll << ' '
         << s.name << ' '
         << s.age << ' '
         << s.address << ' ';
}
int main()
{
    Student s = {2020, 21, "Md shamim ahmed", "kushtia"};
    print(s);
    
}