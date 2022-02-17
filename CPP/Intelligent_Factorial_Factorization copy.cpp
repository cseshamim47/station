#include <bits/stdc++.h>
using namespace std;

#define BOOST ios_base::sync_with_stdio(false);cin.tie(NULL);cout.tie(NULL);
#define endl "\n"
#define w(t) int t; cin >> t; while(t--){ solve(); }
#define int long long
#define MAX 106

vector<int> P;
int prime[MAX];

void sieve()
{
    for(int i = 3; i*i <= MAX; i+=2)
    {
        if(!prime[i])
        for(int j = i*i; j <= MAX; j+=i)
        {
            prime[j] = true;
        }
    }
    P.push_back(2);
    for(int i = 3; i <= MAX; i+=2)
    {
        if(!prime[i]) P.push_back(i);
    }
}
// Case 3: 6 = 2 (4) * 3 (2) * 5 (1)
int Case;
void solve()
{
    int n;
    cin >> n;
    cout << "Case " << ++Case << ": " << n << " = ";
    for(int i = 0; P[i] <= n; i++)
    {
        if(i != 0 ) cout << " * ";
        int tmp = P[i];
        int cnt = 0;
        while(n/tmp != 0)
        {
            cnt+=n/tmp;
            tmp *= P[i];
        }
        cout << P[i] << " (" << cnt << ")";
    }
    cout << endl;
}

int32_t main()
{
    // BOOST
    sieve();
    w(t)
    //solve();
}