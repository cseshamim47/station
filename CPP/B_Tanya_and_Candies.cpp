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
    vi v(n);
    int even[n]{0},odd[n]{0};
    fo(i,n) 
    {
        v[i] = in;
        if(i%2 == 0)
        {
            if(i > 0)
            {
                odd[i] = odd[i-1];
                even[i] = even[i-1];
            }
            odd[i] += v[i];
        }
        else 
        {
            
            if(i > 0)
            {
                odd[i] = odd[i-1];
                even[i] = even[i-1];
            }
            even[i] += v[i];
        }
    }

    // for(auto x : odd) cout << x << " ";
    // printf("\n");
    // for(auto x : even) cout << x << " ";
    // printf("\n");

    int cnt = 0;
    fo(i,n)
    {
        int e = 0, o = 0;
        if(i == 0)
        {   
            o = even[n-1];
            e = odd[n-1]-odd[0];
            if(o == e) cnt++;
            continue;
        }
        
        // 1 4 3 3 4 5
        /* 
            1  3  4 
              4  3  5
         */
        // if((i+1)%2 == 0) // even place
        // {
        //     e = even[i-1];
        //     o = odd[i-1];
        //     e += odd[n-1]-odd[i];
        //     o += even[n-1]-even[i];
        // }else
        // {
        //     // 1 4 3 3 4 5
        // }

            o = odd[i-1];
            e = even[i-1];
            o += even[n-1]-even[i];
            e += odd[n-1]-odd[i];
        if(o == e) cnt++;
    }

    cout << cnt << endl;

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