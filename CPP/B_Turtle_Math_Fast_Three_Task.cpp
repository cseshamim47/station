#include<bits/stdc++.h>
using namespace std;
int main()
{
    int t;
    cin>>t;
    while(t--)
    {
        int n;
        cin>>n;
        int sum=0;
        unordered_map<int,int> mp;
        for(int i=0;i<n;i++)
        {
            int x;
            cin>>x;
            mp[x]++;
            sum+=x;
        }
        if(sum%3==0)
        {
            cout<<0<<endl;
        }
        else if(sum<3)
        {
            cout<<1<<endl;
        }
        else{
            int flag=0;
            for(int i=0;i<sum;i+=3)
            {
                cout << i << endl;
                if(mp.find(sum-i)!=mp.end())
                {
                    cout<<1<<endl;
                    flag=1;
                    break;
                }
            }
            if(flag==0)
            {
                if((sum+1)%3==0)
                {
                    cout<<1<<endl;
                }
                else{
                    cout<<2<<endl;
                }
            }
        }
    }
}