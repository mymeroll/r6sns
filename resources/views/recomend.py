from recommendation_data import dataset
import math

def get_similairty(person1,person2):

  #二人とも見た映画集合を作成する
  set_person1 = set(dataset[person1].keys())
  #print("Lisa Roseが視聴した映画")
  print(set_person1)
  set_person2 = set(dataset[person2].keys())
  #print("Jack Matthewsが試聴した映画")
  #print(set_person2)
  #print("二人とも視聴した映画")
  set_both = set_person1.intersection(set_person2)
  #print(set_both)

  if len(set_both)==0:
    return 0

  list_destance = []

  for item in set_both:
    #レビューの二乗の差を求めて評価の差を求める
    distance = pow(dataset[person1][item]-dataset[person2][item], 2)
    #print(distance)
    list_destance.append(distance)

  #類似度求める
  return 1/(1+math.sqrt(sum(list_destance)))

def get_recommend(person, top_N):

  totals = {}
  simSums = {}

  #ユーザーのリストを取得する
  list_others = dataset.keys()

  for other in list_others:
    #他のユーザーが見たことがあり、本人が見たことが無い映画を取得
    set_other = set(dataset[other])
    #print(set_other)
    set_person = set(dataset[person])
    #print(set_person)
    set_new_movie = set_other.difference(set_person)

    #ユーザーと本人の類似度を計算
    sim = get_similairty(person, other)

    for item in set_new_movie:

      # "類似度 x レビュー点数" を推薦度のスコアとして、全ユーザーで積算する
      totals.setdefault(item,0)
      totals[item] += dataset[other][item]*sim
      #print(totals)
      # またユーザの類似度の積算値をとっておき、これで上記のスコアを除する
      simSums.setdefault(item,0)
      simSums[item] += sim

  rankings = [(total/simSums[item],item) for item,total in totals.items()]
  rankings.sort()
  rankings.reverse()

  return [i[1] for i in rankings][:top_N]
