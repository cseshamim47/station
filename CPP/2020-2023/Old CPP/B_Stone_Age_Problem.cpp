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

void f()
{}

int Case;
void solve()
{
    int i,j,m,n;
    n = in;
    int q = in;
    vi v(n);
    int sum = 0;
    set<int> s;
    fo(i,n)
    {
        v[i] = in;
        sum += v[i];
        s.insert(i);
    }	
    bool ok = true;
    int prev = 0;

    while(q--)
    {
        int x = in;
        if(x == 1)
        {
            i = in;
            m = in;
            if(s.count(i-1))
            {
                sum -= v[i-1];
                sum += m;
                v[i-1] = m;
            }else
            {
                sum -= prev;
                sum += m;
                v[i-1] = m;
                s.insert(i-1);
            }
        }else
        {
            m = in;
            sum = n*m;
            // ok = false;
            prev = m;
            s.clear();
        }

        cout << sum << endl;
    }
    

}

int32_t main()
{
      //        Bismillah
    // fileInput();
    // BOOST
    // w(t)
    solve();
    // f();
}