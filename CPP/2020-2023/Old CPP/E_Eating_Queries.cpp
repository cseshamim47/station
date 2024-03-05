#include <bits/stdc++.h>
using namespace std;

#define fo(i,n) for(i=0;i<n;i++)
#define vi vector<int>
#define pb push_back
#define pf push_front
#define deb(x) cout << #x << "=" << x << endl
#define deb2(x, y) cout << #x << "=" << x << "," << #y << "=" << y << endl
#define sq(x)  ( (x)*(x) )
#define s(x)   x.size()
#define all(x) x.begin(),x.end()
#define BOOST ios_base::sync_with_stdio(false);cin.tie(NULL);cout.tie(NULL);
#define nl printf("\n");
#define endl "\n"
#define w(t) int t; cin >> t; while(t--){ solve(); }
#define int long long
#define ll unsigned long long
#define MAX 1000006

struct{
    template<class T> operator T() {
        T x;
        cin >> x;
        return x;
    }
}in;

void fileInput()
{
    #ifndef ONLINE_JUDGE
        freopen("input.txt", "r", stdin);
        freopen("output.txt", "w", stdout);
    #endif
}

int gcd(int a, int b)
{
    if(!b) return a;
    return gcd(b,a%b);
}

int f(vi &v,int m,int x)
{
    int cnt = 0;
    int sum = 0;
    for(int i = s(v)-1; i >= x; i--)
    {
        if(sum < m)
        {
            sum+=v[i];
            cnt++;
        }else break;
    }
    return cnt;
}

int Case;
void solve()
{
    int i,j,m,n;
    n = in, m =in;
    vi v(n);
    fo(i,n) v[i] = in;
    sort(all(v),greater<int>());

    vi sum(n);
    // sum[0] = 0;

    for(int i = 0; i < n; i++)
    {
        if(i == 0)
        {
            sum[0] = v[0];
        }else
        {
            sum[i] += v[i] + sum[i-1];
        }
    }

    while(m--)
    {
        int sugar;
        cin >> sugar;
        auto idx = lower_bound(all(sum),sugar);
        if(idx == sum.end()) cout << -1 << endl;
        else
        cout << idx-sum.begin()+1 << endl;
    }
    
    // for(auto x : v) cout << x << " ";nl;
    // for(auto x : sum) cout << x << " ";


}

int32_t main()
{
      //        Bismillah
    // fileInput();
    // BOOST
    w(t)
    // solve();
    // f();
}