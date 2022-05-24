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

    int k = n;
    set<int> s;
    vector<int> v;
    
    for(int i = 2; i*i <= n; i++)
    {
        if(n%i == 0)
        {
            s.insert(i);
            int x = n/i;
            for(int j = 2; j*j <= x; j++)
            {
                if(x%j == 0 && j != x/j)
                {
                    s.insert(j);
                    s.insert(x/j);

                    if(s.size() == 3)
                    {
                        cout << "YES" << endl;
                        for(auto ss : s)
                        {
                            cout << ss << " ";
                        }
                        cout << endl;
                        return;
                    }
                }
            }

        }
        s.clear();
    }
    cout << "NO" << endl;
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