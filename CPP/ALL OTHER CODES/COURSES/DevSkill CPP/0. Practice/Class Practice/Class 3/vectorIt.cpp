#include <bits/stdc++.h>
using namespace std;

void print(const vector<int> &v){
    printf("\n");
    for(vector<int>::const_iterator it = v.begin(); it != v.end(); ++it){
        printf("%d ", *it);
    }
}


int main()
{
    vector<int> v;
    // v.reserve(5);
    for(int i = 0; i < 5; i++){
        v.push_back(i+1);
    }

    v.insert(v.begin()+2, 30);
    v.insert(v.end(), 6);
    
    for(vector<int>::iterator it = v.begin(); it != v.end(); it++){
        printf("%d ",*it);
    }
    printf("\n");

    for(vector<int>::reverse_iterator it = v.rbegin(); it != v.rend(); it++){
        printf("%d ", *it);
    }

    
    v.erase(v.end()-5);

    print(v);
    
}