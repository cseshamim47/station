
#include<bits/stdc++.h>
using namespace std;

#define Speed() ios_base::sync_with_stdio(0);cin.tie(0);cout.tie(0);


bool desc(const pair<int,int>&a,const pair<int,int>&b)
{
  return (abs(a.first-a.second)<abs(b.first-b.second));
}
long long cal(long long x)
{
  if(x==1)
    return 1;
  return cal(x/2)+1;
}
void solve()
{
  long long x;
  while(cin>>x)
  {
    
    cout<<cal(x)<<endl;
   

   
  }
}

int main() {
  Speed();
   solve();
  
    

  return 0;
}


