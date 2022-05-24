#include <bits/stdc++.h>
using namespace std;

#define sq(x)  ( (x)*(x) )
#define s(x)   x.size()
#define all(x) x.begin(),x.end()
#define BOOST ios_base::sync_with_stdio(false);cin.tie(NULL);cout.tie(NULL);
#define endl "\n"
#define w(t) int t; cin >> t; while(t--){ solve(); }
#define int long long
#define ll unsigned long long
#define MAX 1000006

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
    int n;
    cin >> n;

    bitset<32> bit(n);

    // cout << bit << endl;
    int f = -1;
    for(int k = 0; k < 31; k++)
    {
        if(!bit.test(k+1) && bit.test(k))
        {
            bit.flip(k+1);
            bit.flip(k);
            break;
        }else if(bit.test(k))
        {
            f = k;
        }
    }

    // cout << bit << endl;
    for(int i = 0; i < f; i++)
    {
        if(!bit.test(i))
        {
            int cnt = 0;
            for(int m = 0; m < 32; m++)
            {
                if(m == f) continue;
                if(i == m || bit.test(m))
                cnt += pow(2,m);
            }
            if(cnt <= n) continue;
            
            bit.flip(i); // 1
            bit.flip(f); //  0
            int tmpBit = -1;
            for(int k = i+1; k < f; k++)
            {
                if(bit.test(k)) tmpBit = k;
            }
            f = tmpBit;
        }
        
    }
    // cout << bit << endl;

    // if(f > 0 && !bit.test(0))
    // {
    //     bit.flip(0);
    //     bit.flip(f);
    // }
    // cout << bit << endl;
// 11011110011000
// 11011110100001

    n = 0;
    for(int i = 0; i < 32; i++)
    {
        if(bit.test(i))
        {
            n += pow(2,i);
        }
    }

    printf("Case %lld: %lld\n",++Case,n);
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