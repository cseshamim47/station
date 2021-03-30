#include <bits/stdc++.h>
using namespace std;

int main()
{
    string s;
    cin >> s;
    int x = stoi(s);
    int ans = 0;
    int base = 1;
    while(x != 0){
        int mod = x%2; // 1
        ans += mod*base; // 1+100
        base *= 10; // 100
        x /= 2; // 1
    }    
    cout << ans << endl;
    
}