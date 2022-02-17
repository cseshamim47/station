#include <bits/stdc++.h>
using namespace std;

#define BOOST ios_base::sync_with_stdio(false);cin.tie(NULL);cout.tie(NULL);
#define endl "\n"
#define w(t) int t; cin >> t; while(t--){ solve(); }
#define int long long
#define MAX 1000006

bool isPrime(int n)
{
    if(n < 4) return true;
    for(int i = 2; i*i <= n; i++)
    {
        if(n%i == 0) return false;
    }
    return true;
}

void solve()
{
    int n;
    cin >> n;
    string str;
    cin >> str;
    for(int i = 0; i < str.size(); i++)
    {
        if(str[i] != '2' && str[i] != '3' && str[i] != '5' && str[i] != '7')
        {
            cout << 1 << endl;
            cout << str[i] << endl;
            return;
        }
    }
    for(int i = 0; i < n; i++)
    {
        bool areshala = false;
        for (int j = i+1; j < n; j++)
        {
            int a = str[i]-'0';   
            a*=10;
            a+=(str[j]-'0');
            if(isPrime(a) == false)
            {
                cout << 2 << endl;
                cout << str[i] << str[j] << endl;
                areshala = true;
                break;
            }
        }
        if(areshala) break;
    }
}

int32_t main()
{
      //        Bismillah
    // BOOST
    w(t)
    //solve();
    // cout << isPrime(9) << endl;
}