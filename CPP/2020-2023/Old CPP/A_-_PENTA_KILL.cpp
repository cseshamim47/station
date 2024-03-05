#include<bits/stdc++.h>
#include<stdio.h>
using namespace std;

#define ll               long long
#define ull              unsigned long long
#define pll              pair <long long,long long>
#define IM               INT_MAX
#define Im               INT_MIN
#define fast             ios_base::sync_with_stdio(0);cin.tie(0);cout.tie(0)
#define read             freopen("input.txt", "r", stdin)
#define write            freopen("output.txt", "w", stdout)
#define pb               push_back
#define all(v)           sort(v.begin(),v.end())
#define rall(v)          sort(v.rbegin(),v.rend())
#define rev(v)           reverse(v.begin(),v.end())
#define ff               first
#define ss               second
#define MOD              1000000007
#define lcm(a, b)        ((a)*((b)/__gcd(a,b)))
#define INF              1e12
#define mem(a, b)        memset(a, b, sizeof(a))
#define POPCOUNT         __builtin_popcountll
#define endl             "\n"
#define pi               2*acos(0.0)


void solve()
{
    int n;

    cin>>n;

    vector<pair<string, string> >v;

    for(int i=0;i<n;i++)
    {
        string a,b;
        cin>>a>>b;
        v.pb({a,b});
    }

    int f1 = 0;

    for(int i=0;i<n;i++)
    {
        map<string,int>mp;
        int co = 0, f = 0;

        for(int j=i;j<n;j++)
        {
            //cout<<j<<" "<<v[j].ff<<" "<<co<<endl;

            if(v[i].ff==v[j].ff){
                if(mp[v[j].ss]==0){
                    mp[v[j].ss]++;
                    co++;
                }
                else{
                    mp[v[j].ss] = 1;
                    co = 1;
                }
            }

            if(co==5)
            {
                f = 1;
                break;
            }
        }
        if(f)
        {
            f1 =  1;
            break;
        }
    }


    if(f1)
        cout<<"PENTA KILL!"<<endl;
    else
        cout<<"SAD:("<<endl;
}


int main()
{


    fast;

    int t=1;

    //cin>>t;

    while(t--)
        solve();
}
