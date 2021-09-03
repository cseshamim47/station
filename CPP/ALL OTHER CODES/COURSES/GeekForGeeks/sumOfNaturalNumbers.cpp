#include <iostream>
#include <algorithm>
#include <cstring>
#include <vector>
#include <numeric>
using namespace std;

int main()
{
    string str;
    str = "shamim";
    for(int i = 0; i < str.length(); i++){
        cout << str[i];
    }
    cout << endl;
    for(char x : str) cout << x;


}