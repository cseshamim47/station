#include <bits/stdc++.h>
using namespace std;

#define BOOST ios_base::sync_with_stdio(false);cin.tie(NULL);cout.tie(NULL);
#define endl "\n"
#define w(t) int t; cin >> t; while(t--){ solve(); }
#define int long long
#define MAX 1000006

const int N = 1e6;
bool prime[N+20];
vector<int> p;

void sieve()
{
    for(int i = 2; i*i<= N; i++)
    {
        if(!prime[i])
        for(int j = i*i; j <= N; j+=i)
        {
            prime[j] = true;
        }
    }

    p.push_back(2);
    for(int i = 3; i <= N; i+=2)
    {
        if(!prime[i]) p.push_back(i);
    }
}

int Case;
void solve()
{
    int n;
    cin >> n;
    int cn = n;
    int ans = 1;

    for(int i = 0; i < p.size() && p[i]*p[i] <= cn; i++)
    {
        int cp = p[i];
        int cnt = 0;
        while(cn % cp == 0)
        {
            cn /= cp;
            cnt++;
        }
        ans *= (cnt + 1);
        // if(cn < p[i]) break;
    }
    if(cn > 1)
    {
        ans *= 2;
    }
    cout << "Case " << ++Case << ": " << ans-1 << endl;
}

int32_t main()
{
      //        Bismillah
    BOOST
    sieve();
    // cout << p.size() << endl;
    // for(int i = 0; i < 10; i++) cout << p[i] << endl;
    w(t)
    //solve();
}