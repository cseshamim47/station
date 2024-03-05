#include <bits/stdc++.h>
using namespace std;
#define ll int
int mod = 1e9 + 7;

int32_t main()
{
    string str;
    int k;
    cin >> str >> k;

    int f[26] = {};
    int n = str.size(); 
    int cnt = 0;
    int self = 0;
    for(int i = n-1; i >= 0; i--)
    {
        for(char ch = 'a'; ch < str[i]; ch++)
        {
            cnt += f[ch-'a'];
            self += f[ch-'a'];
        }

        for(char ch = str[i]+1; ch <= 'z'; ch++)
        {
            cnt += f[ch-'a'];
        }

        f[str[i]-'a']++;
    }

    int ans = ((self%mod) * (k%mod))%mod;
    int a,d;
    a = cnt;
    n = k-1;
    d = (((a%mod)*(n%mod))%mod)-(((a%mod)*(n-1))%mod)%mod;
    if(d < 0) d+=mod;

    ans += ((n/2)*(((2*a)%mod + ((n-1)*d)%mod)%mod))%mod;
    if(ans < 0) ans += mod;
    cout << ans << endl;


}