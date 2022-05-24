#include <bits/stdc++.h>
using namespace std;

#define fo(i,n) for(i=0;i<n;i++)
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
    string str = "";

    i = in, j = in, n = in;
    m = 0;
    int x = n;
    // n++;

    if(i > j) m++;
    while(n--)
    {
        if(m%2 == 0)
        {
            str+="1";
            j--;
        }else
        {
            str+="0";
            i--;
        }
        m++;
    }
    n = x;
    string tmp;
    int ci = i;
    int cj = j;

    if(i > j) i--;
    else j--;

    while(i) 
    {
        if(str[0] == '0')
        {
            tmp = '0';
            tmp+=str;
            str = tmp;       
        }else 
        {
            str+='0';
        }
        i--;
    }
    
    while(j) 
    {
        if(str[0] == '1')
        {
            tmp = '1';
            tmp+=str;
            str = tmp;       
        }else 
        {
            str+='1';
        }
        j--;
    }

    if(ci > cj) i = 1;
    else j = 1;
    // deb(str);
    int k = 0;
    int cnt = 0;
    fo(k,s(str)-1) 
    {
        if(str[k] != str[k+1]) cnt++;
    }
    // deb(i);
    // deb(j);
    if(cnt != n) 
    {
        if(i > 0)
        {
            if(str[0] != '1')
            {
                str+='0';
            }else 
            {
                tmp = '0';
                tmp+=str;
                str = tmp;  
            }
        }else if(j > 0) 
        {
            if(str[0] != '0')
            {
                str+='1';
            }else 
            {
                tmp = '1';
                tmp+=str;
                str = tmp;  
            }
        }
    }else
    {
        if(i > 0)
        {
            if(str[0] == '0')
            {
                tmp = '0';
                tmp+=str;
                str = tmp;  
            }else 
            {
                str+='0';
            }
        }else if(j > 0)
        {
            if(str[0] == '1')
            {
                tmp = '1';
                tmp+=str;
                str = tmp;  
            }else 
            {
                str+='1';
            }
        }

    }
    // cout << i << " " << j << endl;
    cout << str << endl;
}

// 0101010101010101010
//? 0000000000000000000000000000000000000000010101010101010101011111111111111111111111111111111111111 
// 0101010101010101011111111111111111111111111111111111111100000000000000000000000000000000000000000

int32_t main()
{
      //        Bismillah
    // fileInput();
    // BOOST
    // w(t)
    solve();
    // f();
}