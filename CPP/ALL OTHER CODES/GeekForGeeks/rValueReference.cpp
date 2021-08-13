#include <iostream>
#include <vector>
using namespace std;

void print(const string &s){
    cout << s << "\n";
}

void editAndPrint(string &&s){
    s = "Hi, " + s;
    cout << s << '\n';
}

void intFunction(int &&x){
    x += 10;
    cout << x << endl;
}


int main()
{
    print("Welcome aboard, Shamim");
    editAndPrint("Welcome aboard, Shanto");
    int y = 5;
    intFunction(5);
    return 0;
    
}