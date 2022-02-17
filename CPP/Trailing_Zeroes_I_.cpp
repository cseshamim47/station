#include <bits/stdc++.h>
using namespace std;

#define BOOST ios_base::sync_with_stdio(false);cin.tie(NULL);cout.tie(NULL);
#define endl "\n"
#define w(t) int t; cin >> t; while(t--){ solve(); }
#define int long long
// #define N 100005

const int N = 1e6+50;

bool prime[N+10];
vector<int> p;

void sieve()
{
    for(int i = 3; i*i <= N; i+=2)
    {
        if(!prime[i])
        for(int j = i*i; j<=N; j+=i)
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
    int sz = p.size();
    int ans = 1;
    for(int i = 0; i < sz && p[i]*p[i] <= n; i++)
    {
        if(n%p[i] == 0)
        {
            int tmp = p[i];
            int cnt = 0;
            while(n%tmp == 0)
            // while(n/tmp != 0)
            {
                cout << tmp << " " << n/tmp << endl;
                n/=tmp;
                cnt++;
            }
            ans *= (cnt+1);
        }
    }
    cout << ans << endl;
    if(n!=1) 
    {
        ans *= 2;
    }
    cout << "Case " << ++Case << ": " << --ans << endl;
}

int32_t main()
{
      //        Bismillah
    // BOOST
    sieve();
    w(t)
    //solve();
}