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

    vector<string>v;
    vector<ll>v1;
    v1.pb(0);

    ll s = 0;

    for(int i=0; i<n; i++)
    {
        string c;
        cin>>c;
        v.pb(c);
        int co = 0;
        for(int j=0; j<c.size(); j++)
        {
            if(c[j]=='a' || c[j]=='e' || c[j]=='i' || c[j]=='o' || c[j]=='u')
            {
                int k = j;
                while(k<c.size() && c[k]=='a' || c[k]=='e' || c[k]=='i' || c[k]=='o' || c[k]=='u')
                    k++;
                j = k-1;
                co++;
            }
        }
        s+=co;
        v1.pb(s);
    }
    int ans = 0;

    for(int i=0; i<n; i++)
    {
        int l = i+1, h = n, mid;

        while(l<=h)
        {
            mid = (l+h)/2;
            ll y = v1[mid]-v1[i];
            if(y<17)
                l = mid+1;
            else if(y==17)
            {
                h = mid-1;
                break;
            }
            else
                h = mid-1;
        }
        if(v1[h+1]-v1[i]==17)
        {
            //cout<<i+1<<" "<<h+1<<" ";
            l = i+1;
            ll en = h+1;
            h = en;

            while(l<=h)
            {
                mid = (l+h)/2;
                ll y = v1[mid]-v1[i];
                if(y==5)
                {
                    h = mid-1;
                    break;
                }
                else if(y<5)
                    l = mid+1;
                else
                    h = mid-1;
            }

            if(v1[h+1]-v1[i]==5)
            {
                //cout<<"f1"<<endl;
                //cout<<"f2"<<" ";
                //cout<<i+1<<" "<<h+1<<endl;
                l = h+2;
                ll st = h+2;
                h = en;
                while(l<=h)
                {
                    mid = (l+h)/2;
                    ll y = v1[mid]-v1[st-1];
                    if(y==7)
                    {
                        h = mid-1;
                        break;
                    }
                    else if(y<7)
                        l = mid+1;
                    else
                        h = mid-1;
                }

                if(v1[h+1]-v1[st-1]==7)
                {
                    //cout<<st<<" "<<h+1<<endl;
                    l = h+2;
                    st = h+2;
                    h = en;
                    while(l<=h)
                    {
                        mid = (l+h)/2;
                        ll y = v1[mid]-v1[st-1];
                        if(y==5)
                        {
                            h = mid-1;
                            break;
                        }
                        else if(y<5)
                            l = mid+1;
                        else
                            h = mid-1;
                    }

                    if(v1[h+1]-v1[st-1]==5)
                    {
                        ans++;
                    }
                }
            }
        }
    }

    cout<<ans<<endl;
}


int main()
{

    fast;

    int t=1;

    //cin>>t;

    while(t--)
        solve();
}
