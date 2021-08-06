#include <bits/stdc++.h>
using namespace std;

string decimalToBinary(int x){
    string s = "";

    while(x != 0){
        int mod = x%2;
        s += to_string(mod);
        x /= 2;
    }
    reverse(s.begin(), s.end());
    return s;
}

int main()
{
    int x;
    cin >> x;

    string ans = decimalToBinary(x);

    cout << ans << endl;
    
}