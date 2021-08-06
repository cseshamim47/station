#include <iostream>
using namespace std;

int main()
{
    string s;
    cin >> s;

    int ans = 0;
    int base = 1;
    int size = s.length()-1;
    while(size>=0){
        ans += (s[size] - '0')*base;
        base *= 2;
        size--;
    }
    cout << ans << endl;
    
}